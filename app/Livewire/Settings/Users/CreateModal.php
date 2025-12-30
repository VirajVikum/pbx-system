<?php
namespace App\Livewire\Settings\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\UserType;
use App\Models\Company;
use App\Models\Branch;
use App\Models\CrmDepartment;
use App\Models\Extension;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CreateModal extends Component
{
    public bool $open = false;
    public ?int $userId = null;

    // Form fields
    public string $name = '';
    public ?int $user_type_id = null;
    public string $email = '';
    public string $user_name = '';
    public string $password = '';
    public ?string $phone = null;
    public ?string $nic = null;
    public ?string $gender = null;
    public ?string $address = null;
    public ?string $tenant_context = null; // Company Name
    public ?int $outlet_id = null;
    public ?int $department_id = null;
    public ?int $branch_id = null;
    public ?string $extension = null;

    // Selection data
    public $userTypes = [];
    public $companies = [];
    public $branches = [];
    public $departments = [];
    public $extensions = [];
    public $outlets = [
        ['id' => 1, 'name' => 'Outlet A'],
        ['id' => 2, 'name' => 'Outlet B'],
        ['id' => 3, 'name' => 'Outlet C'],
    ];

    protected $listeners = [
        'createUser',
        'editUser',
    ];

    public function mount()
    {
        $this->userTypes = UserType::all();
        $this->companies = Company::all();
        $this->loadExtensions();
    }

    public function updatedTenantContext($value)
    {
        $this->branch_id = null;
        $this->department_id = null;
        $this->loadBranches($value);
    }

    private function loadBranches($companyName)
    {
        $this->branches = [];
        $this->departments = [];

        if ($companyName) {
            $company = Company::where('name', $companyName)->first();
            if ($company) {
                $this->branches = Branch::where('company_id', $company->id)->get();
            }
        }
    }

    public function updatedBranchId($value)
    {
        $this->department_id = null;
        $this->loadDepartments($value);
    }

    private function loadDepartments($branchId)
    {
        $this->departments = [];

        if ($branchId) {
            $this->departments = CrmDepartment::where('branch_id', $branchId)->get();
        }
    }

    private function loadExtensions()
    {
        $this->extensions = Extension::where('status', 0)->get();
    }

    public function createUser(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    public function editUser(int $id): void
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->user_type_id = $user->user_type_id;
        $this->email = $user->email;
        $this->user_name = $user->user_name;
        $this->phone = $user->phone;
        $this->nic = $user->nic;
        $this->gender = $user->gender;
        $this->address = $user->address;
        $this->tenant_context = $user->tenant_context;
        $this->outlet_id = $user->outlet_id;
        $this->extension = $user->extension;
        $this->password = ''; // Don't fill password on edit for security

        // Reload dependent dropdowns BEFORE setting the selected IDs
        if ($this->tenant_context) {
            $this->loadBranches($this->tenant_context);
        }
        
        $this->branch_id = $user->branch_id;

        if ($this->branch_id) {
            $this->loadDepartments($this->branch_id);
        }
        
        $this->department_id = $user->department_id;

        // Include current extension if editing
        if ($user->extension) {
            $currentExt = Extension::where('extension', $user->extension)->first();
            if ($currentExt && !$this->extensions->contains('extension', $user->extension)) {
                $this->extensions->push($currentExt);
            }
        }

        $this->open = true;
    }

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_type_id' => ['required', 'integer'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pbx.users', 'email')->ignore($this->userId),
            ],
            'user_name' => ['required', 'string', 'max:255'],
            'password' => $this->userId ? ['nullable', 'string', 'min:8'] : ['required', 'string', 'min:8'],
            'phone' => ['nullable', 'string', 'max:20'],
            'nic' => ['nullable', 'string', 'max:20'],
            'gender' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'tenant_context' => ['required', 'string'],
            'branch_id' => ['required', 'integer'],
            'department_id' => ['required', 'integer'],
            'extension' => ['nullable', 'string'],
            'outlet_id' => [Rule::requiredIf($this->user_type_id == 5)],
        ]);

        try {
            DB::connection('pbx')->beginTransaction();
            DB::connection('call_server')->beginTransaction();

            $oldExtension = null;
            if ($this->userId) {
                $oldExtension = User::find($this->userId)->extension;
            }

            $userData = [
                'name' => $this->name,
                'user_type_id' => $this->user_type_id,
                'email' => $this->email,
                'user_name' => $this->user_name,
                'phone' => $this->phone,
                'nic' => $this->nic,
                'gender' => $this->gender,
                'address' => $this->address,
                'tenant_context' => $this->tenant_context,
                'branch_id' => $this->branch_id,
                'department_id' => $this->department_id,
                'extension' => $this->extension,
                'outlet_id' => $this->user_type_id == 5 ? $this->outlet_id : null,
            ];

            if ($this->password) {
                $userData['password'] = $this->password;
            }

            User::updateOrCreate(['id' => $this->userId], $userData);

            // Handle Extension Status
            if ($oldExtension !== $this->extension) {
                if ($oldExtension) {
                    Extension::where('extension', $oldExtension)->update(['status' => 0]);
                }
                if ($this->extension) {
                    Extension::where('extension', $this->extension)->update(['status' => 1]);
                }
            }

            DB::connection('pbx')->commit();
            DB::connection('call_server')->commit();

            $this->dispatch('refreshDatatable');
            $this->open = false;
        } catch (\Exception $e) {
            DB::connection('pbx')->rollBack();
            DB::connection('call_server')->rollBack();
            throw $e;
        }
    }

    private function resetForm(): void
    {
        $this->reset([
            'userId', 'name', 'user_type_id', 'email', 'user_name', 'password',
            'phone', 'nic', 'gender', 'address', 'tenant_context', 'outlet_id',
            'department_id', 'branch_id', 'extension'
        ]);
        $this->branches = [];
        $this->departments = [];
        $this->loadExtensions();
    }

    public function render()
    {
        return view('livewire.settings.users.create-modal');
    }
}

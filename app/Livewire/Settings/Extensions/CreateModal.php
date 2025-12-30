<?php

namespace App\Livewire\Settings\Extensions;

use Livewire\Component;
use App\Models\Extension;
use App\Models\Company;
use App\Models\Branch;
use App\Models\CrmDepartment;
use Illuminate\Validation\Rule;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $extensionId = null;

    public string $extension = '';
    public ?string $exten_type = null;
    public string $password = '';
    public string $context = ''; // Company Name
    public ?string $branch = null;
    public ?string $department = null;
    public ?string $phone_type = null;

    // Selection data
    public $companies = [];
    public $branchesList = [];
    public $departmentsList = [];

    protected $listeners = [
        'createExtension',
        'editExtension',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createExtension(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editExtension(int $id): void
    {
        $ext = Extension::findOrFail($id);

        $this->extensionId = $ext->id;
        $this->extension = $ext->extension;
        $this->exten_type = $ext->exten_type;
        $this->password = $ext->password;
        $this->context = $ext->context;
        $this->branch = $ext->branch;
        $this->department = $ext->department;
        $this->phone_type = $ext->phone_type;

        if ($this->context) {
            $this->loadBranches($this->context);
        }
        if ($this->branch) {
            $this->loadDepartments($this->branch);
        }

        $this->open = true;
    }

    public function updatedContext($value)
    {
        $this->branch = null;
        $this->department = null;
        $this->loadBranches($value);
    }

    private function loadBranches($companyName)
    {
        $this->branchesList = [];
        $this->departmentsList = [];

        if ($companyName) {
            $company = Company::where('name', $companyName)->first();
            if ($company) {
                $this->branchesList = Branch::where('company_id', $company->id)->get();
            }
        }
    }

    public function updatedBranch($value)
    {
        $this->department = null;
        $this->loadDepartments($value);
    }

    private function loadDepartments($branchName)
    {
        $this->departmentsList = [];

        if ($branchName) {
            $branch = Branch::where('name', $branchName)->first();
            if ($branch) {
                $this->departmentsList = CrmDepartment::where('branch_id', $branch->id)->get();
            }
        }
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'extension' => ['required', Rule::unique(Extension::class, 'extension')->ignore($this->extensionId)],
            'password' => ['required'],
            'context' => ['required'],
        ]);

        Extension::updateOrCreate(
            ['id' => $this->extensionId],
            [
                'extension' => $this->extension,
                'exten_type' => $this->exten_type,
                'password' => $this->password,
                'context' => $this->context,
                'branch' => $this->branch,
                'department' => $this->department,
                'phone_type' => $this->phone_type,
                'status' => $this->extensionId ? Extension::find($this->extensionId)->status : 0,
                'updatedby' => auth()->id(),
            ]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    private function resetForm(): void
    {
        $this->reset([
            'extensionId',
            'extension',
            'exten_type',
            'password',
            'context',
            'branch',
            'department',
            'phone_type',
        ]);
        $this->branchesList = [];
        $this->departmentsList = [];
    }


    public function render()
    {
        $this->companies = Company::all();
        return view('livewire.settings.extensions.create-modal');
    }
}

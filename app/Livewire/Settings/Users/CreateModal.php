<?php
namespace App\Livewire\Settings\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $userId = null;

    public string $name = '';
    public string $email = '';
    public ?string $phone = null;
    public ?string $extension = null;

    protected $listeners = [
        'createUser',
        'editUser',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createUser(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editUser(int $id): void
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->extension = $user->extension;

        $this->open = true;
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'email',
                Rule::unique('pbx.users', 'email')->ignore($this->userId),
            ],
            'phone' => ['nullable'],
            'extension' => ['nullable'],
        ]);

        User::updateOrCreate(
            ['id' => $this->userId],
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'extension' => $this->extension,
            ]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    private function resetForm(): void
    {
        $this->reset(['userId', 'name', 'email', 'phone', 'extension']);
    }

    public function render()
    {
        return view('livewire.settings.users.create-modal');
    }
}

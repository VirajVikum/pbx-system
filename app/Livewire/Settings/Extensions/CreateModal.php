<?php

namespace App\Livewire\Settings\Extensions;

use Livewire\Component;
use App\Models\Extension;
use Illuminate\Validation\Rule;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $extensionId = null;

    public string $extension = '';
    public string $password = '';
    public string $context = '';
    public ?string $phone_type = null;
    public ?string $department = null;
    public ?string $status = null;

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
        $this->password = $ext->password;
        $this->context = $ext->context;
        $this->phone_type = $ext->phone_type;
        $this->department = $ext->department;
        $this->status = $ext->status;

        $this->open = true;
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
                'password' => $this->password,
                'context' => $this->context,
                'phone_type' => $this->phone_type,
                'department' => $this->department,
                'status' => $this->status,
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
            'password',
            'context',
            'phone_type',
            'department',
            'status',
        ]);
    }


    public function render()
    {
        return view('livewire.settings.extensions.create-modal');
    }
}

<?php

namespace App\Livewire\Settings\UserTypes;

use Livewire\Component;
use App\Models\UserType;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $userTypeId = null;

    public string $title = '';

    protected $listeners = [
        'createUserType',
        'editUserType',
        'deleteUserType',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createUserType(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editUserType(int $id): void
    {
        $userType = UserType::findOrFail($id);

        $this->userTypeId = $userType->id;
        $this->title = $userType->title;

        $this->open = true;
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'title' => ['required', 'string'],
        ]);

        UserType::updateOrCreate(
            ['id' => $this->userTypeId],
            ['title' => $this->title]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    /* =========================
       Delete
    ==========================*/
    // public function deleteUserType(int $id): void
    // {
    //     UserType::findOrFail($id)->delete();
    //     $this->dispatch('refreshDatatable');
    // }

    /* =========================
       Reset Form
    ==========================*/
    private function resetForm(): void
    {
        $this->reset(['userTypeId', 'title']);
    }

    public function render()
    {
        return view('livewire.settings.user-types.create-modal');
    }
}

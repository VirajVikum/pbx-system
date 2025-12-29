<?php

namespace App\Livewire\Settings\Branches;

use Livewire\Component;
use App\Models\Branch;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $branchId = null;

    public string $name = '';
    public string $code = '';
    public ?int $company_id = null;
    public ?string $status = null;

    protected $listeners = [
        'createBranch',
        'editBranch',
        'deleteBranch',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createBranch(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editBranch(int $id): void
    {
        $branch = Branch::findOrFail($id);

        $this->branchId = $branch->id;
        $this->name = $branch->name;
        $this->code = $branch->code;
        $this->company_id = $branch->company_id;
        $this->status = $branch->status;

        $this->open = true;
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'company_id' => ['required', 'integer'],
            'status' => ['nullable', 'string'],
        ]);

        Branch::updateOrCreate(
            ['id' => $this->branchId],
            [
                'name' => $this->name,
                'code' => $this->code,
                'company_id' => $this->company_id,
                'status' => $this->status,
            ]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    /* =========================
       Delete
    ==========================*/
    // public function deleteBranch(int $id): void
    // {
    //     Branch::findOrFail($id)->delete();
    //     $this->dispatch('refreshDatatable');
    // }

    /* =========================
       Reset Form
    ==========================*/
    private function resetForm(): void
    {
        $this->reset(['branchId', 'name', 'code', 'company_id', 'status']);
    }

    public function render()
    {
        return view('livewire.settings.branches.create-modal');
    }
}

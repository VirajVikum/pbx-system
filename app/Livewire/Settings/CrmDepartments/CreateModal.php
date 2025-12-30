<?php

namespace App\Livewire\Settings\CrmDepartments;

use Livewire\Component;
use App\Models\CrmDepartment;
use App\Models\Branch;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $departmentId = null;

    public string $name = '';
    public ?int $branch_id = null;
    public $branches = [];

    protected $listeners = [
        'createDepartment',
        'editDepartment',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createDepartment(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editDepartment(int $id): void
    {
        $department = CrmDepartment::findOrFail($id);

        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->branch_id = $department->branch_id;

        $this->open = true;
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'string'],
            'branch_id' => ['nullable', 'integer'],
        ]);

        CrmDepartment::updateOrCreate(
            ['id' => $this->departmentId],
            [
                'name' => $this->name,
                'branch_id' => $this->branch_id,
            ]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    /* =========================
       Reset Form
    ==========================*/
    private function resetForm(): void
    {
        $this->reset(['departmentId', 'name', 'branch_id']);
    }

    public function render()
    {
        $this->branches = Branch::all();
        return view('livewire.settings.crm-departments.create-modal');
    }
}

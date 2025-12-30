<?php

namespace App\Livewire\Settings\Companies;

use Livewire\Component;
use App\Models\Company;

class CreateModal extends Component
{
    public bool $open = false;

    public ?int $companyId = null;

    public string $name = '';

    protected $listeners = [
        'createCompany',
        'editCompany',
        'deleteCompany',
    ];

    /* =========================
       Open Create Modal
    ==========================*/
    public function createCompany(): void
    {
        $this->resetForm();
        $this->open = true;
    }

    /* =========================
       Open Edit Modal
    ==========================*/
    public function editCompany(int $id): void
    {
        $company = Company::findOrFail($id);

        $this->companyId = $company->id;
        $this->name = $company->name;

        $this->open = true;
    }

    /* =========================
       Save (Create or Update)
    ==========================*/
    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'string'],
        ]);

        Company::updateOrCreate(
            ['id' => $this->companyId],
            [
                'name' => $this->name,
                'status' => $this->companyId ? Company::find($this->companyId)->status : 1,
            ]
        );

        $this->dispatch('refreshDatatable');
        $this->open = false;
    }

    /* =========================
       Delete
    ==========================*/
    // public function deleteCompany(int $id): void
    // {
    //     Company::findOrFail($id)->delete();
    //     $this->dispatch('tables.company-table', '$refresh');
    // }

    /* =========================
       Reset Form
    ==========================*/
    private function resetForm(): void
    {
        $this->reset(['companyId', 'name']);
    }

    public function render()
    {
        return view('livewire.settings.companies.create-modal');
    }
}

<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Company;

class CompanyTable extends DataTableComponent
{

    protected $listeners = [
    'refreshDatatable' => '$refresh','deleteCompany'
];

public function deleteCompany(int $id): void
    {
        Company::findOrFail($id)->delete();
        $this->dispatch('refreshDatatable');
    }
    protected $model = Company::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Actions')
    ->label(fn ($row) => view('livewire.tables.companies.actions', ['row' => $row]))

        ];
    }
}

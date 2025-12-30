<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CrmDepartment;

class CrmDepartmentsTable extends DataTableComponent
{
    protected $listeners = [
    'refreshDatatable' => '$refresh','deleteDepartment'
];
    protected $model = CrmDepartment::class;

    public function deleteDepartment(int $id): void
    {
        CrmDepartment::findOrFail($id)->delete();
        $this->dispatch('refreshDatatable');
    }

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
            Column::make("Branch", "branch.name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Actions')
    ->label(fn ($row) => view('livewire.tables.crm-departments.actions', ['row' => $row]))

        ];
    }
}

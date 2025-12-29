<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Branch;

class BranchTable extends DataTableComponent
{
    protected $model = Branch::class;

    protected $listeners = [
    'refreshDatatable' => '$refresh','deleteBranch'
];

public function deleteBranch(int $id): void
    {
        Branch::findOrFail($id)->delete();
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
            Column::make("Code", "code")
                ->sortable(),
            Column::make("Company id", "company_id")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Actions')
    ->label(fn ($row) => view('livewire.tables.branches.actions', ['row' => $row]))

        ];
    }
}

<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
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

    public function filters(): array
    {
        return [
            SelectFilter::make('Company', 'company_id')
                ->options(
                    ['' => 'All Companies'] + \App\Models\Company::pluck('name', 'id')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('company_id', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Code", "code")
                ->sortable()
                ->searchable(),
            Column::make("Company", "company.name")
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

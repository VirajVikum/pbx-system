<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Extension;

class ExtensionsTable extends DataTableComponent
{
    protected $listeners = [
    'refreshDatatable' => '$refresh','deleteExtension'
];

public function deleteExtension(int $id): void
    {
        Extension::findOrFail($id)->delete();
        $this->dispatch('refreshDatatable');
    }

    protected $model = Extension::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Extension", "extension")
                ->sortable(),
            Column::make("Exten type", "exten_type")
                ->sortable(),
            Column::make("Password", "password")
                ->sortable(),
            Column::make("Company", "context")
                ->sortable(),
            Column::make("Branch", "branch")
                ->sortable(),
            Column::make("Department", "department")
                ->sortable(),
            Column::make("Phone type", "phone_type")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Updated by", "updater.username")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Actions')
            ->label(fn ($row) => view('livewire.tables.extensions.actions', [
                'row' => $row,
            ])),
        ];
    }
}

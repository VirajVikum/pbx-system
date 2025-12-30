<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UserType;

class UserTypesTable extends DataTableComponent
{
    protected $listeners = [
    'refreshDatatable' => '$refresh','deleteUserType'
];

public function deleteUserType(int $id): void
    {
        UserType::findOrFail($id)->delete();
        $this->dispatch('tables.user-types-table', '$refresh');
    }


    protected $model = UserType::class;

    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Actions')
    ->label(fn ($row) => view('livewire.tables.user-types.actions', ['row' => $row]))

        ];
    }
}

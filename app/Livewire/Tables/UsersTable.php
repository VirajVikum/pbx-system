<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Actions\Button;


class UsersTable extends DataTableComponent
{
    protected $listeners = ['refreshDatatable' => '$refresh','deleteUser'];

    protected $model = User::class;


public function deleteUser(int $id): void
{
    User::findOrFail($id)->delete();
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
                ->sortable()
                ->searchable(),
            Column::make("User name", "user_name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Extension", "extension")
                ->sortable(),
            Column::make("User Type", "userType.title")
                ->sortable(),
            Column::make("Company", "tenant_context")
                ->sortable(),
            Column::make("Branch", "branch.name")
                ->sortable(),
            Column::make("Department", "department.name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),

            Column::make('Actions')
            ->label(fn ($row) => view('livewire.tables.users.actions', [
                'row' => $row,
            ])),

        ];
    }
}

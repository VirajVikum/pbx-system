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
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Tenant context", "tenant_context")
                ->sortable(),
            Column::make("Two factor confirmed at", "two_factor_confirmed_at")
                ->sortable(),
            Column::make("Current team id", "current_team_id")
                ->sortable(),
            Column::make("Profile photo path", "profile_photo_path")
                ->sortable(),
            Column::make("Agent id", "agent_id")
                ->sortable(),
            Column::make("Extension", "extension")
                ->sortable(),
            Column::make("User name", "user_name")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Nic", "nic")
                ->sortable(),
            Column::make("Gender", "gender")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Break started at", "break_started_at")
                ->sortable(),
            Column::make("Agent break id", "agent_break_id")
                ->sortable(),
            Column::make("User type id", "user_type_id")
                ->sortable(),
            Column::make("Outlet id", "outlet_id")
                ->sortable(),
            Column::make("Department id", "department_id")
                ->sortable(),
            Column::make("Agent break type", "agent_break_type")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Actions')
            ->label(fn ($row) => view('livewire.tables.users.actions', [
                'row' => $row,
            ])),

        ];
    }
}

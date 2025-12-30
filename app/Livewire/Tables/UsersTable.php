<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use App\Models\Extension;
use Illuminate\Support\Facades\DB;


class UsersTable extends DataTableComponent
{
    protected $listeners = ['refreshDatatable' => '$refresh','deleteUser'];

    protected $model = User::class;


public function deleteUser(int $id): void
{
    $user = User::findOrFail($id);
    
    try {
        DB::connection('pbx')->beginTransaction();
        DB::connection('call_server')->beginTransaction();

        if ($user->extension) {
            Extension::where('extension', $user->extension)->update(['status' => 0]);
        }

        $user->delete();

        DB::connection('pbx')->commit();
        DB::connection('call_server')->commit();
    } catch (\Exception $e) {
        DB::connection('pbx')->rollBack();
        DB::connection('call_server')->rollBack();
        throw $e;
    }
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

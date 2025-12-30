<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
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

    public function filters(): array
    {
        return [
            SelectFilter::make('Company', 'tenant_context')
                ->options(
                    ['' => 'All Companies'] + \App\Models\Company::pluck('name', 'name')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('users.tenant_context', $value);
                }),
            SelectFilter::make('Branch', 'branch_id')
                ->options(
                    ['' => 'All Branches'] + \App\Models\Branch::pluck('name', 'id')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('users.branch_id', $value);
                }),
            SelectFilter::make('Department', 'department_id')
                ->options(
                    ['' => 'All Departments'] + \App\Models\CrmDepartment::pluck('name', 'id')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('users.department_id', $value);
                }),
            SelectFilter::make('User Type', 'user_type_id')
                ->options(
                    ['' => 'All User Types'] + \App\Models\UserType::pluck('title', 'id')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('users.user_type_id', $value);
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
            Column::make("User name", "user_name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Extension", "extension")
                ->sortable()
                ->searchable(),
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

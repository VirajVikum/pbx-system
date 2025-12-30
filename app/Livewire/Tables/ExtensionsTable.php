<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
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

    public function filters(): array
    {
        return [
            SelectFilter::make('Company', 'context')
                ->options(
                    ['' => 'All Companies'] + \App\Models\Company::pluck('name', 'name')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('context', $value);
                }),
            SelectFilter::make('Branch', 'branch')
                ->options(
                    ['' => 'All Branches'] + \App\Models\Branch::pluck('name', 'name')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('branch', $value);
                }),
            SelectFilter::make('Department', 'department')
                ->options(
                    ['' => 'All Departments'] + \App\Models\CrmDepartment::pluck('name', 'name')->toArray()
                )
                ->filter(function($builder, string $value) {
                    $builder->where('department', $value);
                }),
            SelectFilter::make('Extension Type', 'exten_type')
                ->options([
                    '' => 'All Types',
                    'sip' => 'SIP',
                    'iax2' => 'IAX2',
                    'pjsip' => 'PJSIP',
                ])
                ->filter(function($builder, string $value) {
                    $builder->where('exten_type', $value);
                }),
            SelectFilter::make('Phone Type', 'phone_type')
                ->options([
                    '' => 'All Phone Types',
                    'mobile' => 'Mobile',
                    'desk' => 'Desk',
                ])
                ->filter(function($builder, string $value) {
                    $builder->where('phone_type', $value);
                }),
             SelectFilter::make('Status', 'status')
                ->options([
                    '' => 'All',
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
                ->filter(function($builder, string $value) {
                    $builder->where('exten.status', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Extension", "extension")
                ->sortable()
                ->searchable(),
            Column::make("Exten type", "exten_type")
                ->sortable(),
            Column::make("Password", "password")
                ->sortable(),
            Column::make("Company", "context")
                ->sortable()
                ->searchable(),
            Column::make("Branch", "branch")
                ->sortable()
                ->searchable(),
            Column::make("Department", "department")
                ->sortable()
                ->searchable(),
            Column::make("Phone type", "phone_type")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable()
                ->format(function($value) {
                    return $value == 1 
                        ? '<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>'
                        : '<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Inactive</span>';
                })
                ->html(),
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

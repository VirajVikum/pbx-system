<?php

namespace App\Filament\Resources\CrmDepartments;

use App\Filament\Resources\CrmDepartments\Pages\CreateCrmDepartment;
use App\Filament\Resources\CrmDepartments\Pages\EditCrmDepartment;
use App\Filament\Resources\CrmDepartments\Pages\ListCrmDepartments;
use App\Filament\Resources\CrmDepartments\Pages\ViewCrmDepartment;
use App\Filament\Resources\CrmDepartments\Schemas\CrmDepartmentForm;
use App\Filament\Resources\CrmDepartments\Schemas\CrmDepartmentInfolist;
use App\Filament\Resources\CrmDepartments\Tables\CrmDepartmentsTable;
use App\Models\CrmDepartment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CrmDepartmentResource extends Resource
{
    protected static ?string $model = CrmDepartment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CrmDepartmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CrmDepartmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CrmDepartmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCrmDepartments::route('/'),
            'create' => CreateCrmDepartment::route('/create'),
            'view' => ViewCrmDepartment::route('/{record}'),
            'edit' => EditCrmDepartment::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

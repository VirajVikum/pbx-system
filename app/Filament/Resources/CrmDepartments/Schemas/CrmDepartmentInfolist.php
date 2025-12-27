<?php

namespace App\Filament\Resources\CrmDepartments\Schemas;

use App\Models\CrmDepartment;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CrmDepartmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('branch_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (CrmDepartment $record): bool => $record->trashed()),
            ]);
    }
}

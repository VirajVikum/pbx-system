<?php

namespace App\Filament\Resources\CrmDepartments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CrmDepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('branch_id')
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}

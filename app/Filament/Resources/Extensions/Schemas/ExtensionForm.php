<?php

namespace App\Filament\Resources\Extensions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExtensionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('extension')
                    ->required(),
                TextInput::make('exten_type')
                    ->required()
                    ->default('sip'),
                TextInput::make('password')
                    ->password(),
                TextInput::make('context')
                    ->required()
                    ->default('internal'),
                TextInput::make('phone_type')
                    ->tel(),
                TextInput::make('department'),
                Toggle::make('status')
                    ->required(),
                TextInput::make('updatedby'),
                DateTimePicker::make('datetime'),
            ]);
    }
}

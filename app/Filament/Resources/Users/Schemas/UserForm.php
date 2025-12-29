<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('tenant_context'),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull(),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull(),
                DateTimePicker::make('two_factor_confirmed_at'),
                TextInput::make('current_team_id')
                    ->numeric(),
                TextInput::make('profile_photo_path'),
                TextInput::make('agent_id')
                    ->numeric(),
                TextInput::make('extension'),
                TextInput::make('user_name'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('nic'),
                TextInput::make('gender'),
                Textarea::make('address')
                    ->columnSpanFull(),
                DateTimePicker::make('break_started_at'),
                TextInput::make('agent_break_id')
                    ->numeric(),
                TextInput::make('agent_break_type'),
                TextInput::make('user_type_id')
                    ->numeric(),
                TextInput::make('outlet_id')
                    ->numeric(),
                TextInput::make('department_id')
                    ->numeric(),
                TextInput::make('branch_id')
                    ->numeric(),
            ]);
    }
}

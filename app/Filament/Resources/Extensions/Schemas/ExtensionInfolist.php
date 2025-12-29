<?php

namespace App\Filament\Resources\Extensions\Schemas;

use App\Models\Extension;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExtensionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('extension'),
                TextEntry::make('exten_type'),
                TextEntry::make('context'),
                TextEntry::make('phone_type')
                    ->placeholder('-'),
                TextEntry::make('department')
                    ->placeholder('-'),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('updatedby')
                    ->placeholder('-'),
                TextEntry::make('datetime')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Extension $record): bool => $record->trashed()),
            ]);
    }
}

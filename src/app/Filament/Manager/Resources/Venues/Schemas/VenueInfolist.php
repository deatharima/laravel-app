<?php

namespace App\Filament\Manager\Resources\Venues\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VenueInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('description')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('logo_path')
                    ->placeholder('-'),
                TextEntry::make('cover_path')
                    ->placeholder('-'),
                TextEntry::make('fee_percent')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

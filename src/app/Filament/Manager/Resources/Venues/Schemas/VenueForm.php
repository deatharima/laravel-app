<?php

namespace App\Filament\Manager\Resources\Venues\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VenueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('description'),
                TextInput::make('address'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('logo_path'),
                TextInput::make('cover_path'),
                TextInput::make('fee_percent')
                    ->required()
                    ->numeric()
                    ->default(5),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Venues\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

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
                FileUpload::make('logo_path'),
                FileUpload::make('cover_path'),
                TextInput::make('fee_percent')
                    ->required()
                    ->numeric()
                    ->default(5),
            ]);
    }
}

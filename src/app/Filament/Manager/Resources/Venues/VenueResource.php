<?php

namespace App\Filament\Manager\Resources\Venues;

use App\Filament\Manager\Resources\Venues\Pages\CreateVenue;
use App\Filament\Manager\Resources\Venues\Pages\EditVenue;
use App\Filament\Manager\Resources\Venues\Pages\ListVenues;
use App\Filament\Manager\Resources\Venues\Pages\ViewVenue;
use App\Filament\Manager\Resources\Venues\Schemas\VenueForm;
use App\Filament\Manager\Resources\Venues\Schemas\VenueInfolist;
use App\Filament\Manager\Resources\Venues\Tables\VenuesTable;
use App\Models\Venue;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return VenueForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VenueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VenuesTable::configure($table);
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
            'index' => ListVenues::route('/'),
            'create' => CreateVenue::route('/create'),
            'view' => ViewVenue::route('/{record}'),
            'edit' => EditVenue::route('/{record}/edit'),
        ];
    }
}

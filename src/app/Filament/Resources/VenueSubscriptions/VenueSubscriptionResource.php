<?php

namespace App\Filament\Resources\VenueSubscriptions;

use App\Filament\Resources\VenueSubscriptions\Pages\CreateVenueSubscription;
use App\Filament\Resources\VenueSubscriptions\Pages\EditVenueSubscription;
use App\Filament\Resources\VenueSubscriptions\Pages\ListVenueSubscriptions;
use App\Filament\Resources\VenueSubscriptions\Pages\ViewVenueSubscription;
use App\Filament\Resources\VenueSubscriptions\Schemas\VenueSubscriptionForm;
use App\Filament\Resources\VenueSubscriptions\Schemas\VenueSubscriptionInfolist;
use App\Filament\Resources\VenueSubscriptions\Tables\VenueSubscriptionsTable;
use App\Models\VenueSubscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VenueSubscriptionResource extends Resource
{
    protected static ?string $model = VenueSubscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return VenueSubscriptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VenueSubscriptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VenueSubscriptionsTable::configure($table);
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
            'index' => ListVenueSubscriptions::route('/'),
            'create' => CreateVenueSubscription::route('/create'),
            'view' => ViewVenueSubscription::route('/{record}'),
            'edit' => EditVenueSubscription::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        return $user && $user->role === 'admin';
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}

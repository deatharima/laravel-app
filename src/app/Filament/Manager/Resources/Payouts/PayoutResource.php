<?php

namespace App\Filament\Manager\Resources\Payouts;

use App\Filament\Manager\Resources\Payouts\Pages\CreatePayout;
use App\Filament\Manager\Resources\Payouts\Pages\EditPayout;
use App\Filament\Manager\Resources\Payouts\Pages\ListPayouts;
use App\Filament\Manager\Resources\Payouts\Pages\ViewPayout;
use App\Filament\Manager\Resources\Payouts\Schemas\PayoutForm;
use App\Filament\Manager\Resources\Payouts\Schemas\PayoutInfolist;
use App\Filament\Manager\Resources\Payouts\Tables\PayoutsTable;
use App\Models\Payout;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PayoutResource extends Resource
{
    protected static ?string $model = Payout::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PayoutForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PayoutInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PayoutsTable::configure($table);
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
            'index' => ListPayouts::route('/'),
            'create' => CreatePayout::route('/create'),
            'view' => ViewPayout::route('/{record}'),
            'edit' => EditPayout::route('/{record}/edit'),
        ];
    }
}

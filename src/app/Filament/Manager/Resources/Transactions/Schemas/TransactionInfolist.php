<?php

namespace App\Filament\Manager\Resources\Transactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('service_fee')
                    ->numeric(),
                TextEntry::make('payout_amount')
                    ->numeric(),
                TextEntry::make('venue.name')
                    ->label('Venue'),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('status'),
                TextEntry::make('payment_provider'),
                TextEntry::make('payment_id'),
                TextEntry::make('device_uuid')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

<?php

namespace App\Filament\Manager\Resources\Transactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('service_fee')
                    ->required()
                    ->numeric(),
                TextInput::make('payout_amount')
                    ->required()
                    ->numeric(),
                Select::make('venue_id')
                    ->relationship('venue', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_provider')
                    ->required(),
                TextInput::make('payment_id')
                    ->required(),
                TextInput::make('device_uuid'),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Transactions\Schemas;

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
                TextInput::make('venue_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_provider')
                    ->required(),
                TextInput::make('payment_id')
                    ->required(),
            ]);
    }
}

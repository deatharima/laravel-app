<?php

namespace App\Filament\Resources\VenueSubscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VenueSubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subscription Details')
                    ->schema([
                        Select::make('venue_id')
                            ->relationship('venue', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('subscription_plan_id')
                            ->relationship('subscriptionPlan', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'trial' => 'Trial',
                                'past_due' => 'Past Due',
                                'cancelled' => 'Cancelled',
                                'expired' => 'Expired',
                            ])
                            ->default('trial')
                            ->required(),
                    ])
                    ->columns(3),

                Section::make('Dates')
                    ->schema([
                        DateTimePicker::make('trial_ends_at')
                            ->label('Trial Ends At'),
                        DateTimePicker::make('starts_at')
                            ->label('Starts At')
                            ->required(),
                        DateTimePicker::make('ends_at')
                            ->label('Ends At')
                            ->required(),
                        DateTimePicker::make('cancelled_at')
                            ->label('Cancelled At'),
                    ])
                    ->columns(2),

                Section::make('Payment Provider')
                    ->schema([
                        TextInput::make('payment_provider')
                            ->maxLength(255),
                        TextInput::make('provider_subscription_id')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }
}

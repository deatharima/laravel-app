<?php

namespace App\Filament\Resources\SubscriptionPlans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubscriptionPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(),
                        Textarea::make('description')
                            ->rows(3),
                    ])
                ->columns(2),

                Section::make('Pricing')
                    ->schema([
                        Select::make('billing_cycle')
                        ->options([
                            'monthly' => 'Monthly',
                            'yearly' => 'Yearly',
                        ])
                        ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                        TextInput::make('currency')
                            ->default('USD')
                            ->maxLength(3)
                            ->required(),
                    ])
                    ->columns(3),
                Section::make('Fees')
                    ->schema([
                        TextInput::make('fee_percent')
                            ->numeric()
                            ->suffix('%')
                            ->default(5)
                            ->required(),
                        TextInput::make('min_fee')
                            ->numeric()
                            ->prefix('$')
                            ->default(0),
                    ])
                    ->columns(2),
                Section::make('Limits')
                    ->schema([
                        TextInput::make('max_venues')
                            ->numeric()
                            ->default(1)
                            ->required(),
                        TextInput::make('max_employees_per_venue')
                            ->numeric()
                            ->default(10)
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Settings')
                    ->schema([
                        Toggle::make('is_active')
                            ->default(true),
                        Toggle::make('is_popular')
                            ->default(false),
                        TagsInput::make('features')
                            ->placeholder('Add a feature'),
                    ])
                    ->columns(3),
            ]);
    }
}

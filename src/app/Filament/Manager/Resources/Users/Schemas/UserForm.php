<?php

namespace App\Filament\Manager\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('country'),
                TextInput::make('city'),
                TextInput::make('contact_phone')
                    ->tel(),
                DatePicker::make('dob'),
                TextInput::make('gender'),
                TextInput::make('avatar'),
                TextInput::make('role')
                    ->required()
                    ->default('employee'),
                TextInput::make('balance')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('personal_slug'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}

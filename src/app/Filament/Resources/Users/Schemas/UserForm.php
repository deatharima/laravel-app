<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([

                Wizard::make([

                    Wizard\Step::make('Major')->icon('heroicon-o-user')->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')
                            ->email(),
                        TextInput::make('password')
                            ->password()
                            ->revealable(),
                        Select::make('role')
                            ->options([
                                'employee' => 'Employee',
                                'manager' => 'Manager',
                                'admin' => 'Admin',
                            ])
                            ->default('employee')
                            ->required(),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Contact')->icon('heroicon-o-phone')->schema([
                        Select::make('country')->options(['Country1', 'Country2', 'Country3']),
                        Select::make('city')->options(['City1', 'City2', 'City3']),
                        TextInput::make('contact_phone')
                            ->tel()->mask('+7 777 777-77-77'),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Additional')->icon('css-add')->schema([
                        Select::make('dob')->options(array_combine(
                                range(date('Y'), 1900),
                                range(date('Y'), 1900),
                            )
                        ),

                        Radio::make('gender') ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])
                            ->inline()
                            ->inlineLabel(false),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Avatar')->icon('css-profile')->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->avatar(),
                        ])
                        ->columns(2),

                    ])
                ->columnSpanFull(),
            ]);
    }
}

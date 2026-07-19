<?php

namespace App\Filament\Resources\EmployeeRequests;

use App\Filament\Resources\EmployeeRequests\Pages\CreateEmployeeRequest;
use App\Filament\Resources\EmployeeRequests\Pages\EditEmployeeRequest;
use App\Filament\Resources\EmployeeRequests\Pages\ListEmployeeRequests;
use App\Filament\Resources\EmployeeRequests\Pages\ViewEmployeeRequest;
use App\Filament\Resources\EmployeeRequests\Schemas\EmployeeRequestForm;
use App\Filament\Resources\EmployeeRequests\Schemas\EmployeeRequestInfolist;
use App\Filament\Resources\EmployeeRequests\Tables\EmployeeRequestsTable;
use App\Models\EmployeeRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EmployeeRequestResource extends Resource
{
    protected static ?string $model = EmployeeRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EmployeeRequestForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmployeeRequestInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeeRequestsTable::configure($table);
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
            'index' => ListEmployeeRequests::route('/'),
            'create' => CreateEmployeeRequest::route('/create'),
            'view' => ViewEmployeeRequest::route('/{record}'),
            'edit' => EditEmployeeRequest::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        return $user && ($user->role === 'admin' || $user->role === 'manager');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}

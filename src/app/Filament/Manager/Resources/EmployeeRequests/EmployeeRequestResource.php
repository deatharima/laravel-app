<?php

namespace App\Filament\Manager\Resources\EmployeeRequests;

use App\Filament\Manager\Resources\EmployeeRequests\Pages\CreateEmployeeRequest;
use App\Filament\Manager\Resources\EmployeeRequests\Pages\EditEmployeeRequest;
use App\Filament\Manager\Resources\EmployeeRequests\Pages\ListEmployeeRequests;
use App\Filament\Manager\Resources\EmployeeRequests\Pages\ViewEmployeeRequest;
use App\Filament\Manager\Resources\EmployeeRequests\Schemas\EmployeeRequestForm;
use App\Filament\Manager\Resources\EmployeeRequests\Schemas\EmployeeRequestInfolist;
use App\Filament\Manager\Resources\EmployeeRequests\Tables\EmployeeRequestsTable;
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
}

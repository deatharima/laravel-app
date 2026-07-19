<?php

namespace App\Filament\Resources\EmployeeRequests\Pages;

use App\Filament\Resources\EmployeeRequests\EmployeeRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeRequests extends ListRecords
{
    protected static string $resource = EmployeeRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

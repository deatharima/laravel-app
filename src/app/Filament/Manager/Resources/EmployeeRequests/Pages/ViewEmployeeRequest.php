<?php

namespace App\Filament\Manager\Resources\EmployeeRequests\Pages;

use App\Filament\Manager\Resources\EmployeeRequests\EmployeeRequestResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmployeeRequest extends ViewRecord
{
    protected static string $resource = EmployeeRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

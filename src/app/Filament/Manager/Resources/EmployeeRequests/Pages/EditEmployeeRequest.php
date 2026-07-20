<?php

namespace App\Filament\Manager\Resources\EmployeeRequests\Pages;

use App\Filament\Manager\Resources\EmployeeRequests\EmployeeRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeRequest extends EditRecord
{
    protected static string $resource = EmployeeRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

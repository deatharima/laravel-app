<?php

namespace App\Filament\Manager\Resources\EmployeeRequests\Pages;

use App\Filament\Manager\Resources\EmployeeRequests\EmployeeRequestResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeeRequest extends CreateRecord
{
    protected static string $resource = EmployeeRequestResource::class;
}

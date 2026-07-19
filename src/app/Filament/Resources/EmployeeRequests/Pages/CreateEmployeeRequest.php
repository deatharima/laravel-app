<?php

namespace App\Filament\Resources\EmployeeRequests\Pages;

use App\Filament\Resources\EmployeeRequests\EmployeeRequestResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeeRequest extends CreateRecord
{
    protected static string $resource = EmployeeRequestResource::class;
}

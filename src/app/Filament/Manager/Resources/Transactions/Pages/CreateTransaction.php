<?php

namespace App\Filament\Manager\Resources\Transactions\Pages;

use App\Filament\Manager\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}

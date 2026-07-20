<?php

namespace App\Filament\Manager\Resources\Payouts\Pages;

use App\Filament\Manager\Resources\Payouts\PayoutResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPayouts extends ListRecords
{
    protected static string $resource = PayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

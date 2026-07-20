<?php

namespace App\Filament\Manager\Resources\Payouts\Pages;

use App\Filament\Manager\Resources\Payouts\PayoutResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPayout extends ViewRecord
{
    protected static string $resource = PayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\VenueSubscriptions\Pages;

use App\Filament\Resources\VenueSubscriptions\VenueSubscriptionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVenueSubscription extends ViewRecord
{
    protected static string $resource = VenueSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

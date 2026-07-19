<?php

namespace App\Filament\Resources\VenueSubscriptions\Pages;

use App\Filament\Resources\VenueSubscriptions\VenueSubscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVenueSubscription extends EditRecord
{
    protected static string $resource = VenueSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

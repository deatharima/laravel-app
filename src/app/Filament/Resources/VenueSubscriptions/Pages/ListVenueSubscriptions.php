<?php

namespace App\Filament\Resources\VenueSubscriptions\Pages;

use App\Filament\Resources\VenueSubscriptions\VenueSubscriptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVenueSubscriptions extends ListRecords
{
    protected static string $resource = VenueSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

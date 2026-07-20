<?php

namespace App\Filament\Manager\Resources\Reviews\Pages;

use App\Filament\Manager\Resources\Reviews\ReviewResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReview extends ViewRecord
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

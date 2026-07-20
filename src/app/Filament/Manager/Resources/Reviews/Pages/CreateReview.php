<?php

namespace App\Filament\Manager\Resources\Reviews\Pages;

use App\Filament\Manager\Resources\Reviews\ReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;
}

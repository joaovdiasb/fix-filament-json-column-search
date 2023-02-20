<?php

namespace App\Filament\Resources\JsonTableResource\Pages;

use App\Filament\Resources\JsonTableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJsonTable extends CreateRecord
{
    protected static string $resource = JsonTableResource::class;
}

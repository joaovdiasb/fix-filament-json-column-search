<?php

namespace App\Filament\Resources\JsonTableResource\Pages;

use App\Filament\Resources\JsonTableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJsonTables extends ListRecords
{
    protected static string $resource = JsonTableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\RetirementStatusResource\Pages;

use App\Filament\Resources\RetirementStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRetirementStatuses extends ListRecords
{
    protected static string $resource = RetirementStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

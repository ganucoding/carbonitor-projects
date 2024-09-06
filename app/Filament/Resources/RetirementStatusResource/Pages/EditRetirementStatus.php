<?php

namespace App\Filament\Resources\RetirementStatusResource\Pages;

use App\Filament\Resources\RetirementStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRetirementStatus extends EditRecord
{
    protected static string $resource = RetirementStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

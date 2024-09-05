<?php

namespace App\Filament\Resources\CertificationDocumentsResource\Pages;

use App\Filament\Resources\CertificationDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCertificationDocuments extends EditRecord
{
    protected static string $resource = CertificationDocumentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

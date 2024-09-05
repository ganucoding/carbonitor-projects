<?php

namespace App\Filament\Resources\CertificationDocumentsResource\Pages;

use App\Filament\Resources\CertificationDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificationDocuments extends ListRecords
{
    protected static string $resource = CertificationDocumentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

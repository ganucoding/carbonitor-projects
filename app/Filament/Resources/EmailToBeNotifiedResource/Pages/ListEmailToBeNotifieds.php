<?php

namespace App\Filament\Resources\EmailToBeNotifiedResource\Pages;

use App\Filament\Resources\EmailToBeNotifiedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmailToBeNotifieds extends ListRecords
{
    protected static string $resource = EmailToBeNotifiedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

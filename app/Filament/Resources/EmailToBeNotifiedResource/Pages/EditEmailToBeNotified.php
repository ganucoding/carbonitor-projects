<?php

namespace App\Filament\Resources\EmailToBeNotifiedResource\Pages;

use App\Filament\Resources\EmailToBeNotifiedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmailToBeNotified extends EditRecord
{
    protected static string $resource = EmailToBeNotifiedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

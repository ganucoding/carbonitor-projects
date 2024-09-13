<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Mail\CommentStatusUpdated;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditComment extends EditRecord
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Set status_updated_by = current logged-in user
        $data['status_updated_by'] = auth()->user()->id;

        return $data;
    }

    protected function afterSave(): void
    {
        // Runs after the form fields are saved to the database

        // Send email
        $record = $this->getRecord();
        Mail::to($record->email)->send(new CommentStatusUpdated($record));
    }
}

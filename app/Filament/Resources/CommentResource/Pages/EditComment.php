<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Mail\CommentStatusChanged;
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
        // Send email
        $record = $this->getRecord();
        $email = $record->email;
        $status = $data['status'];
        $comment = $record;
        Mail::to($email)->send(new CommentStatusChanged($status, $comment));

        // Set status_changed_by
        $data['status_changed_by'] = auth()->user()->id;

        return $data;
    }
}

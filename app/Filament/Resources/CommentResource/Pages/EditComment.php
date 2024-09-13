<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Mail\CommentStatusUpdated;
use Filament\Actions;
use Filament\Actions\Action;
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
        $record = $this->getRecord();

        // Check if the status is 'approved' or 'rejected'
        if (in_array($record->status, ['approved', 'rejected'])) {
            Mail::to($record->email)->send(new CommentStatusUpdated($record)); // Send email to commenter's email
        }
    }

    protected function getSaveFormAction(): Action
    {
        parent::getSaveFormAction()
            ->disabled(function (): bool {
                $status = $this->data['status'] ?? '';
                return in_array($status, ['approved', 'rejected']); // Disable the save button if status is 'approved' or 'rejected'
            });

        // Create a new save action with custom confirmation modal settings
        return Action::make('save')
            ->label(__('Save Changes'))
            ->requiresConfirmation()
            ->modalHeading('Confirm Save')
            ->modalDescription('Are you sure you want to save these changes? If the status is updated, an email will be sent to the commenter.')
            ->modalSubmitActionLabel('Yes, save changes and notify via email')
            ->modalIconColor('warning')
            ->action(fn() => $this->save())
            ->keyBindings(['mod+s']);
    }
}

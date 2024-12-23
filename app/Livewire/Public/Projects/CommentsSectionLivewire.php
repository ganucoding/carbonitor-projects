<?php

namespace App\Livewire\Public\Projects;

use App\Filament\Resources\CommentResource;
use App\Mail\CommentSubmitted;
use App\Mail\NotifyAdminCommentSubmitted;
use App\Models\EmailToBeNotified;
use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;

class CommentsSectionLivewire extends Component
{
    public Project $project;

    public $comments;

    #[Validate('required')]
    public $username;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $comment;

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = $this->project->comments()
            ->approved() // Apply 'approved' scope
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function addComment()
    {
        $this->validate();

        // Prepare the data for the new comment
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'comment' => $this->comment,
        ];

        // Attempt to create a new comment
        $comment = $this->project->comments()->create($data);

        if ($comment) {
            // Retrieve all approved users
            $approvedUsers = User::isApproved()->get();

            // Notify each user
            foreach ($approvedUsers as $recipient) {
                // Send notification to admin (database)
                Notification::make()
                    ->title('Comment Submitted')
                    ->success()
                    ->body('A new comment has been submitted by ' . $this->email . '.')
                    ->actions([
                        Action::make('viewComment')
                            ->label('View Comment')
                            ->url(
                                fn(): string => CommentResource::getUrl('edit', ['record' => $comment->id]), // Use the newly created comment ID
                                shouldOpenInNewTab: true
                            )
                            ->icon('heroicon-m-eye')
                            ->button()
                            ->markAsRead(),
                    ])
                    ->sendToDatabase($recipient);

                // Send notification to admin (email)
                $activeEmails = EmailToBeNotified::isActive()->pluck('email');
                $activeEmails->each(function ($email) use ($comment) {
                    Mail::to($email)->send(new NotifyAdminCommentSubmitted($comment)); // Iterate over the collection and send the email to each one
                });
            }

            // Send email to commenter's email
            Mail::to($comment->email)->send(new CommentSubmitted($comment));

            // Display flash message in projects-listing-livewire
            $this->dispatch('display-flash-message')->to(ProjectsListingLivewire::class);

            // Clear form fields if comment creation is successful
            $this->username = '';
            $this->email = '';
            $this->comment = '';

            // Reload comments to update the view
            $this->loadComments();
        } else {
            // Handle failure case (optional)
            // You might want to set an error message or log the failure
        }
    }

    public function render()
    {
        return view('livewire.public.projects.comments-section-livewire');
    }
}

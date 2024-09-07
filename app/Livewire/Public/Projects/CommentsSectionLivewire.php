<?php

namespace App\Livewire\Public\Projects;

use Livewire\Component;
use App\Models\Project;

class CommentsSectionLivewire extends Component
{
    public Project $project;
    public $comments;
    public $username;
    public $email;
    public $comment;

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = $this->project->comments()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function addComment()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'comment' => $this->comment,
        ];

        $this->project->comments()->create($data);

        $this->username = '';
        $this->email = '';
        $this->comment = '';

        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.public.projects.comments-section-livewire');
    }
}

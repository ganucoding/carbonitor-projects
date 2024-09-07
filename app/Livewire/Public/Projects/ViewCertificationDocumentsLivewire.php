<?php

namespace App\Livewire\Public\Projects;

use App\Models\Project;
use Livewire\Component;

class ViewCertificationDocumentsLivewire extends Component
{
    public Project $project;

    public function render()
    {
        return view('livewire.public.projects.view-certification-documents-livewire');
    }
}

<?php

namespace App\Livewire\Public\Projects;

use App\Models\Project;
use Livewire\Component;

class ViewProjectLivewire extends Component
{
    public $unique_id;

    public function render()
    {
        $project = Project::where('unique_id', $this->unique_id)->firstOrFail();

        return view('livewire.public.projects.view-project-livewire', compact('project'));
    }
}

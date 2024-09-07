<?php

namespace App\Livewire\Public\Projects;

use App\Models\Project;
use App\Models\Retirement;
use Livewire\Component;

class ViewRetirementLivewire extends Component
{
    public Project $project;
    public Retirement $retirement;

    public function render()
    {
        return view('livewire.public.projects.view-retirement-livewire');
    }
}

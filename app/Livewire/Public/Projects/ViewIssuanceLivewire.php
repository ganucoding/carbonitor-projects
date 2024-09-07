<?php

namespace App\Livewire\Public\Projects;

use App\Models\Issuance;
use App\Models\Project;
use Livewire\Component;

class ViewIssuanceLivewire extends Component
{
    public Project $project;
    public Issuance $issuance;

    public function render()
    {
        return view('livewire.public.projects.view-issuance-livewire');
    }
}

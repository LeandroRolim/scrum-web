<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class VotingComponent extends Component
{
    public Project $project;

    public ?string $task_selected = null;

    public function getTaskProperty()
    {
        return $this->project->tasks;
    }

    public function render()
    {
        return view('livewire.project.voting-component');
    }
}

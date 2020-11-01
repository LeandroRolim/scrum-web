<?php


namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Tasks extends Component
{
    use AuthorizesRequests;

    public Project $project;

    protected $rules = [
        'title' => 'required|min:5',
        'description' => 'required|min:5',
    ];

    public string $title = '';
    public string $description = '';

    public function mount()
    {
        $this->authorize('view', $this->project);
        $this->task = new Task();
    }

    public function addTask()
    {
        //TODO: need authorization
        $this->validate();
        $this->project->tasks()->save(new Task([
            'title' => $this->title,
            'description' => $this->description,
        ]));
        $this->reset('title', 'description');
        $this->project->load('tasks');
    }

    public function removeTask($task_id)
    {
        //TODO: need authorization
        $this->project->tasks()->where('uuid', $task_id)->delete();
        $this->project->load('tasks');
    }

    public function voting()
    {
        return redirect()->route('project.voting');
    }
}

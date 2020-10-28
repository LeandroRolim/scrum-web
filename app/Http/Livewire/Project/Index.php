<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getProjectsProperty()
    {
        return Project::where('user_id', auth()->id())
            ->where('name', 'like', "%{$this->search}%")
            ->paginate();
    }
}

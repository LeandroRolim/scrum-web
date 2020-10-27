<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Members extends Component
{
    use AuthorizesRequests;
    public Project $project;

    public string $email = '';

    public function mount()
    {
        $this->authorize('view', $this->project);
    }

    public function addMember()
    {
        $this->authorize('update', $this->project);
        $user = User::where('email', $this->email)->first();
        if (is_null($user)) {
            $this->addError('email', __('E-mail not found'));
            return;
        }
        $this->resetErrorBag('email');
        $this->reset('email');
        $this->project->members()->syncWithoutDetaching($user);
        $this->project->load('members');
    }

    public function removeMember($user_id)
    {
        $this->authorize('update', $this->project);
        $this->project->members()->detach($user_id);
        $this->project->load('members');
    }
}

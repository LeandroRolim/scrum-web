<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public ?string $name = null;

    protected array $rules = [
        'name' => 'required|min:4'
    ];
    public function submit()
    {
        $this->validate();
        Project::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('project.index');
    }
}

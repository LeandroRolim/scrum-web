<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;

class Index extends Component
{
    public $header = 'Projects';

    public function render()
    {
        return view('livewire.project.index');
    }
}

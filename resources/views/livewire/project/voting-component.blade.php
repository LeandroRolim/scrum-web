<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
        {{ __('Voting') }}
    </h2>
</x-slot>

<div class="container bg-white rounded shadow my-4 p-4 mx-auto">
    <form class="grid gap-4">
        <div>
            <select class="shadow-sm rounded-md form-input w-full" wire:model.defer="task_selected">
                <option value="">{{ __('No selection') }}</option>
                @foreach ($this->tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->task }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-jet-secondary-button>
                {{ __('Start') }}
                <i class="fas fa-hourglass-start"></i>
            </x-jet-secondary-button>
        </div>

    </form>
</div>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
        {{ $project->name }}
        <a href="{{ route('project.voting', $project->id) }}" class="button secondary">
            Voting
            <i class="fas fa-eye"></i>
        </a>
    </h2>
</x-slot>
<div>
    <div class="container mx-auto bg-white m-4 p-4 shadow rounded">
        <form wire:submit.prevent="addTask">
            <div>
                <x-jet-label>{{ __('Title') }}</x-jet-label>
                <x-jet-input class="w-full sm:w-1/2" wire:model='title' />
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <x-jet-label>{{ __('Description') }}</x-jet-label>
                <x-jet-input  class="w-full" wire:model='description'/>
                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <x-jet-button class="my-4">Add task</x-jet-button>
        </form>
        <hr>
        <div class="my-4">
            <h3 class="font-bold">
                {{ __('Filters') }}
                <form>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="col">
                            <x-jet-label>
                                {{ __('Title') }}
                            </x-jet-label>
                            <x-jet-input class="w-full sm:w-full"/>
                        </div>
                        <div class="col">
                            <x-jet-label>
                                {{ __('Others') }}
                            </x-jet-label>

                            <div>
                                <input type="checkbox"/>
                                <label class="font-normal">
                                    {{ __('Voteds') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <x-jet-secondary-button class="mt-4">
                        {{ __('Filter') }}
                        <i class="fas fa-search"></i>
                    </x-jet-secondary-button>
                </form>
            </h3>

        </div>


        <hr>
        <table class="table-auto w-full divide-y divide-gray-700 text-left leading-10">
            <thead>
                <tr>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400">
                @forelse ($project->tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td class="text-right text-orange-600">
                            <i class="fas fa-trash" wire:click="removeTask('{{ $task->uuid }}')"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">
                            {{ __('Empty') }}
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

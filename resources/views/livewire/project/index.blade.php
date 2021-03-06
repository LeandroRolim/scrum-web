<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    <a href="{{ route('project.create') }}" class="">
            <i class="fas fa-plus-circle"></i>
        </a>
    </h2>
</x-slot>

<div class="container mx-auto mt-4 bg-white rounded shadow p-4">
    <div>
        <x-jet-label>{{ __('Search') }}</x-jet-label>
        <x-jet-input wire:model.debounce.1000ms="search" placeholder="{{ __('Search') }}" class="w-full sm:w-1/2 md:w-1/4"/>
    </div>
    <hr class="my-4">
    <div class="text-center">
        <div wire:loading>
            <i class="fas fa-spinner fa-pulse mt-2 text-2xl text-blue-700 my-8" ></i>
        </div>
    </div>

    <table wire:loading.remove class="table-auto w-full text-left divide-y divide-black leading-10">
        <thead>
            <tr>
                <th>#</th>
                <th colspan="2">{{ __('Project') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($this->projects as $item)
                <tr>
                    <td>
                        {{ $loop->iteration + (($this->projects->currentPage()-1) * $this->projects->perPage()) }}
                    </td>
                    <td colspan="1">
                        {{ $item->name }}
                    </td>
                    <td class="text-green-700 text-right">
                        <a href="{{ route('project.members', $item->id) }}" class="mx-4">
                            <i class="fas fa-users"></i>
                        </a>
                        <a href="{{ route('project.tasks', $item->id) }}">
                            <i class="fas fa-tasks"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('Empty') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div wire:loading.remove>
        {{ $this->projects->links() }}
    </div>


</div>


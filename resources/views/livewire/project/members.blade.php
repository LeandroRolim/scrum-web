<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Members from') }}: {{ $project->name }}
    </h2>
</x-slot>
<div class="container mx-auto m-4 p-4 rounded shadow bg-white">
    @can('update', $project)
    <form wire:submit.prevent="addMember">
        <div>
            <x-jet-label>
                {{ __('E-mail') }}
            </x-jet-label>
            <div>
                <x-jet-input wire:model.defer="email"/>
            </div>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <x-jet-button class="my-4">
            {{ __('Add member') }}
        </x-jet-button>
    </form>
    <hr>
    @endcan
    <table class="divide-y divide-gray-800 table-auto w-full text-left">
        <thead>
            <tr>
                <th colspan="2">{{ __('Members') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($project->members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td class="text-right">
                    @can('update', $project)
                        <button wire:click="removeMember({{ $member->id }})">
                            <i class="fas fa-trash mx-2 text-orange-600"></i>
                        </button>
                    @endcan
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

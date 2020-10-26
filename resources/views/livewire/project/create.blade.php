<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create projects') }}
</x-slot>

<div>
    <div class="container mx-auto bg-white rounded shadow my-4 p-4">
        <form wire:submit.prevent="submit">
            <div>
                <x-jet-label for="name" value="{{ __('Project name') }}" />
                <x-jet-input id="name" class="block mt-1 sm:w-1/2 w-full" type="text" wire:model.defer="name" required autofocus />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>

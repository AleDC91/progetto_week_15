<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="ms-4 mt-4">
        <x-back-button />
    </div>
    <div class="py-8 lg:container mx-auto flex flex-col lg:flex-row w-full px-3">
        <div class="my-courses">
            <x-my-courses :user="$user" />
            <x-my-past-courses :user="$user" />
            <x-my-stats :user="$user" />
        </div>

    </div>
    @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</x-app-layout>

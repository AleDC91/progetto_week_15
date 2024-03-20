<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Page') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:container mx-auto flex flex-col lg:flex-row w-full px-3">

        <x-accept-users-table :courses="$courses"/>
    </div>
    @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</x-app-layout>

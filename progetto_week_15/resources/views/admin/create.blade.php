<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:container mx-auto flex flex-col lg:flex-row w-full px-3">
        <x-form-create-course :instructors="$instructors"/>
    </div>
    @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Instructors') }}
        </h2>
    </x-slot>
    <div class="ms-4 mt-4">
        <x-back-button />
    </div>
    <div>
        <x-all-instructors :instructors="$instructors" />
    </div>
</x-app-layout>
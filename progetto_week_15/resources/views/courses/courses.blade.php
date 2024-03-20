<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>
    <div>
        <x-all-courses-table :courses="$courses"/>
        <x-all-past-courses :courses="$courses"/>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instructor Profile') }}
        </h2>
    </x-slot>
    <div class="ms-4 mt-4">
        <x-back-button />
    </div>
    <h1 class="mt-8 text-4xl text-center bold">{{ $instructor->name }}</h1>

    <div class="flex flex-col md:flex-row w-full justify-center h-100 items-center">

        <div class="flex items-center h-full">
            <div class="flex-shrink-0 w-200 h-200 ">
                <img class="w-full h-full rounded-full overflow-hidden" src="{{ $instructor->profile_image }}"
                    alt="{{ $instructor->name }}" />
            </div>
        </div>
        <div class="h-full p-8 flex flex-col justify-evenly">
            <p class='text-2xl bold mb-4'>Specialization: <span class="text-lg">{{ $instructor->specialization }}</span>
            </p>
            <p class='text-2xl bold mb-4'>Email: <span class="text-lg"><a
                        href="mailto:{{ $instructor->email }}">{{ $instructor->email }}</a></span></p>
            <p class='text-2xl bold mb-4'>Phone: <span class="text-lg"><a
                        href="tel:{{ $instructor->email }}">{{ $instructor->phone_number }}</a></span></p>
            <p class='text-2xl bold mb-4'>In our team since: <span
                    class="text-xl">{{ Str::substr($instructor->hire_date, 0, 4) }}</span></p>
        </div>
    </div>
    <div class="w-100 m-2 md:m-28 text-center mt-4">
        <p class='text-2xl bold'>Bio: <span class="text-lg">{{ $instructor->bio }}</span></p>

    </div>
</x-app-layout>

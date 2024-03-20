<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>
    <div class="flex w-full flex-col md:flex-row justify-center mt-10 gap-10 items-center">
        <div>
            <x-pie-chart :users="$users" :courses="$courses" :confirmedUsers="$confirmedUsers" :pendingUsers="$pendingUsers" :cancelledUsers="$cancelledUsers" />
        </div>
        <div>
            <x-histogram :courseStatistics="$courseStatistics" />
        </div>
        <div>
            <p class="text-3xl mb-4">Total Users: <span>{{count($users)}}</span></p>
            <p class="text-3xl mb-4">Total Instructors: <span>{{count($instructors)}}</span></p>
            <p class="text-3xl mb-4">Total Proposed Courses: <span>{{count($courses)}}</span></p>

        </div>
    </div>
    @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</x-app-layout>

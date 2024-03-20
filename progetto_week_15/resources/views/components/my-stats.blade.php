@php
    use Carbon\Carbon as Carbon;
@endphp

<div class="user-courses-table m-10 p-8 bg-slate-200">

    <div class="flex flex-col md:flex-row items-center justify-between pb-6">
        <div>
            <span class="text-4xl pb-4 mb-2">My Stats</span>
        </div>
    </div>

    <div>
        <ul class="flex justify-between text-xl">
            <li>Courses Completed: <span class="text-3xl ms-2 bold">{{count($completedCourses($user->courses))}}</span></li>
            <li>Pending Subscription: <span class="text-3xl ms-2 bold">{{count($statusSubscriptions($user->courses, 'pending'))}}</span></li>
            <li>Accepted Subscriptions: <span class="text-3xl ms-2 bold">{{count($statusSubscriptions($user->courses, 'confirmed'))}}</span></li>
            <li>Rejected Subscriptions: <span class="text-3xl ms-2 bold">{{count($statusSubscriptions($user->courses, 'cancelled'))}}</span></li>
        
        </ul>
    </div>
    {{-- @push('scripts')
        @vite(['resources/js/searchPastCourses.js'])
    @endpush --}}
</div>
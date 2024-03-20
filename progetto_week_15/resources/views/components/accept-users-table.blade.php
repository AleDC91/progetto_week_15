@php
    use Carbon\Carbon as Carbon;
@endphp

<div class="w-full accept-users-table m-10 p-8 bg-slate-200">
    <div class="flex flex-col md:flex-row items-center justify-between pb-6">
        <div>
            <span class="text-4xl pb-4 mb-2">Accept Subscriptions</span>
        </div>
    </div>
    <div class=" bg-zinc-100 relative overflow-x-auto shadow-md sm:rounded-lg mt-4 " id="accordion-collapse"
        data-accordion="collapse">
        @foreach ($courses as $course)
            @php
                $end_date = Carbon::parse($course->end_date);
                $start_date = Carbon::parse($course->start_date);
                $total_months = $start_date->diffInMonths($end_date);
            @endphp
            @if ($isPastDate($end_date))
                @continue
            @endif
            <h2 id="accordion-collapse-heading-{{ $course->id }}" class="w-full ">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-{{ $course->id }}" aria-expanded="true"
                    aria-controls="accordion-collapse-body-{{ $course->id }}">
                    <span class="flex items-center"><i class="fa-solid fa-dumbbell"></i>
                        <h3 class="text-2xl uppercase ms-4">{{ $course->name }}</h3>
                    </span>
                    <a href="#" class="px-6 py-4 text-base">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10 ">
                                <img class="w-full h-full rounded-full overflow-hidden"
                                    src="{{ $course->instructor->profile_image }}"
                                    alt="{{ $course->instructor->name }}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap text-sm">
                                    {{ $course->instructor->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                    <p>Start Date:
                        <span>{{ $course->start_date }}</span>
                    </p>
                    <div>
                        Max Seats: <span
                            class="bg-gray-100 text-gray-800 text-base font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">{{ $course->total_seats }}</span>
                    </div>
                    <div>
                        Subscribers: <span
                            class="bg-blue-100 text-blue-800 text-base font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $course->users->count() }}</span>
                    </div>
                    <div>
                        @php
                            if ($lessThanLeft($course, 5)) {
                                $class =
                                    'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300';
                            } elseif ($lessThanLeft($course, 10)) {
                                $class =
                                    'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300';
                            } else {
                                $class =
                                    'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300';
                            }
                        @endphp
                        Accepted: <span class="px-3 py-2 rounded-lg {{ $class }}">
                            {{ $countConfirmedUsers($course) }}/{{ $course->total_seats }}
                        </span>
                    </div>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{ $course->id }}" class="hidden"
                aria-labelledby="accordion-collapse-heading-{{ $course->id }}">

                <div id="table-container-{{ $course->id }}">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                        id="accept-users-table">
                        <thead class="text-xs text-black uppercase bg-purple-400">
                            <tr class="text-base">
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-black bg-purple-100">
                            @foreach ($course->users()->orderByPivot('created_at', 'asc')->get() as $user)
                                @php
                                    $status = $user
                                        ->courseBooked()
                                        ->where('course_id', $course->id)
                                        ->value('status');

                                @endphp
                                <tr class="  hover:bg-opacity-90 text-base border-b border-purple-400">
                                    <td class="px-5 py-5 text-sm">
                                        <a href="#">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10 overflow-hidden">
                                                    <img class="w-full h-full rounded-full overflow-hidden"
                                                        src="{{ $user->profile_image }}" alt="{{ $user->name }}" />
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $user->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        @switch($status)
                                            @case('confirmed')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accepted</span>
                                            @break

                                            @case('pending')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                            @break

                                            @case('cancelled')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rejected</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        @if (!$isMaxCapacityReached($course))
                                            @if ($status === 'pending')
                                                <div class="flex justify-center">

                                                    <button type="button"
                                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 confirm-button"
                                                        data-user-id="{{ $user->id }}"
                                                        data-course-id="{{ $course->id }}">
                                                        Confirm
                                                    </button>

                                                    <button type="button"
                                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 reject-button"
                                                        data-user-id="{{ $user->id }}"
                                                        data-course-id="{{ $course->id }}">
                                                        Reject
                                                    </button>
                                                </div>
                                            @elseif($status === 'confirmed')
                                                <button type="button"
                                                    class="text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 revoke-button"
                                                    data-user-id="{{ $user->id }}"
                                                    data-course-id="{{ $course->id }}">
                                                    Revoke
                                                </button>
                                            @elseif($status === 'cancelled')
                                                <button type="button"
                                                    class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 reconsider-button"
                                                    data-user-id="{{ $user->id }}"
                                                    data-course-id="{{ $course->id }}">
                                                    Reconsider
                                                </button>
                                            @endif
                                        @else
                                            @if ($status === 'pending')
                                                <p class="italic">
                                                    MAX CAPACITY REACHED
                                                </p>
                                            @elseif($status === 'confirmed')
                                                <button type="button"
                                                    class="text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 revoke-button"
                                                    data-user-id="{{ $user->id }}"
                                                    data-course-id="{{ $course->id }}">
                                                    Revoke
                                                </button>
                                            @endif
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
    @push('scripts')
        @vite(['resources/js/handleSubscriptionRequests.js'])
    @endpush
</div>

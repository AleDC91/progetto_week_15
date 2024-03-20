@php
    use Carbon\Carbon as Carbon;
@endphp

<div class="all-courses-table m-10 p-8 bg-slate-200">

    <div class="flex flex-col md:flex-row items-center justify-between pb-6">
        <div>
            <span class="text-4xl pb-4 mb-2">Our Past Courses</span>
        </div>
        <div class="flex items-center justify-between ">
            <form class="flex items-center p-2 rounded-md bg-slate-200">

                <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="search-all-past-course"
                    placeholder="search past course...">
            </form>

        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="all-past-courses-table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-base">
                    <th scope="col" class="px-6 py-3">
                        Course
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Instructor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Difficulty
                    </th>     
                </tr>
            </thead>
            <tbody class="text-black bg-blue-100" >

                @foreach ($courses as $course)
                    @php
                        $end_date = Carbon::parse($course->end_date);
                        $start_date = Carbon::parse($course->start_date);
                        $total_months = $start_date->diffInMonths($end_date);
                    @endphp
                    @if (!$isPastDate($end_date))
                        @continue
                    @endif
               
                    <tr
                    class=" border-b hover:bg-opacity-90 text-base
                {{ $isUserEnrolledInCourse($course->id) ? 'bg-green-100' : '' }}
                {{ $isUserWaitingForConfirmation($course->id) ? 'bg-yellow-100' : '' }}
                
                ">
                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                        {{-- <a href="{{ route('course.show', ['course' => $course->id]) }}"> --}}
                        {{ $course->name }}
                        {{-- </a> --}}
                    </th>
                    <td class="px-6 py-4 text-sm ">
                        @if (strlen($course->description) < 50)
                            {{ $course->description }}
                        @else
                            {{ $excerpt($course->description, 50) }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-base">
                        <a href="#">
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
                    </td>
                    <td class="px-6 py-4 text-base">
                        {{ $course->start_date }}
                    </td>
                    <td class="px-6 py-4 text-base">
                        {{ $course->end_date }}
                    </td>

                    <td class="px-6 py-4 text-zinc-900 text-base ">
                        <div class="flex flex-col items-center justify-between">
                            @switch($course->difficulty)
                                @case('beginner')
                                    <span style=" font-size: 15px">
                                        <i class="fa-solid fa-dumbbell"></i>
                                    </span>
                                @break

                                @case('intermediate')
                                    <span style=" font-size: 15px">
                                        <i class="fa-solid fa-dumbbell"></i><i class="fa-solid fa-dumbbell ms-1"></i>
                                    </span>
                                @break

                                @case('Advanced')
                                    <span style=" font-size: 15px">
                                        <i class="fa-solid fa-dumbbell"></i><i class="fa-solid fa-dumbbell mx-1"></i><i
                                            class="fa-solid fa-dumbbell"></i>
                                    </span>
                                @break

                                @default
                            @endswitch

                            <p class="text-xs text-slate-700">{{ strtoupper($course->difficulty) }}</p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        @vite([
            'resources/js/searchAllPastCourses.js',
            'resources/js/closeAlertBox.js'
        ])
    @endpush
</div>

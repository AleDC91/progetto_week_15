<div class="all-courses-table m-10 p-8 bg-slate-200">

    <div class="flex flex-col md:flex-row items-center justify-between pb-6">
        <div>
            <span class="text-4xl pb-4 mb-2">Our Instructors</span>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="all-courses-table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-base">
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Specialization
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hire Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                </tr>
            </thead>
            <tbody class="text-black bg-red-200">

                @foreach ($instructors as $instructor)
                    <tr class=" border-b hover:bg-opacity-90 text-base">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                            <a href="{{route('instructors.show', ['instructor' => $instructor])}}">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 ">
                                        <img class="w-full h-full rounded-full overflow-hidden"
                                            src="{{ $instructor->profile_image }}" alt="{{ $instructor->name }}" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap text-sm">
                                            {{ $instructor->name }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </th>
                        <td class="px-6 py-4 text-sm ">
                            {{ $instructor->bio }}
                        </td>
                        <td class="px-6 py-4 text-base">
                            {{ $instructor->specialization }}
                        </td>
                        <td class="px-6 py-4 text-base">
                            {{ $instructor->hire_date }}
                        </td>
                        <td class="px-6 py-4 text-base">
                            <a href="mailto:{{$instructor->email}}">
                                {{ $instructor->email }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-base">
                            <a href="tel:{{$instructor->phone_number}}">
                                {{ $instructor->phone_number }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</div>

<form action="{{ route('courses.store',) }}" class="m-10 p-8 mx-auto" method="post">
    @csrf
    <div class="flex flex-col lg:flex-row gap-5">
        <div class="w-full">

            <div class="mb-5">
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Course name</label>
                <input type="text" id="course_name" name="course_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Course name..." required />
            </div>

            <div class="mb-5">
                <label for="course_description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                    Description</label>
                <input type="text" id="course_description" name="course_description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Course description..." />
            </div>
            <div class="flex justify-center">
                <div class="mb-5 w-full">
                    <label for="course_start_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                        Date</label>
                    <input type="date" id="course_start_date" name="course_start_date" value="{{now()->format('Y-m-d')}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5 w-full">
                    <label for="course_end_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                    <input required type="date" id="course_end_date" name="course_end_date" value="{{date('Y-m-d', strtotime('+2 months'));}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>

            <div class="mb-5 w-full">
                <label for="course_instructor"
                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Instructor</label>
                <select id="course_instructor" name="course_instructor">
                    @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-5 w-full">
            <div class="mb-5 w-full">
                <label for="course_cost"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Monthly Cost</label>
                <input type="number" id="course_cost" name="course_cost"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>

            <div class="mb-5 w-full">
                <label for="course_difficulty"
                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Difficulty</label>
                <select id="course_difficulty" name="course_difficulty"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="Advanced">Advanced
                    </option>
                </select>
            </div>

            <div class="mb-5 w-full">
                <label for="course_capacity"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Capacity</label>
                <input type="number" id="course_capacity" name="course_capacity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>



        </div>

    </div>
    <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create!</button>
        @push('scripts')
        @vite(['resources/js/closeAlertBox.js'])
    @endpush
</form>

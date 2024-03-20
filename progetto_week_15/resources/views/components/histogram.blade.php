
<div class="max-w-sm  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
      <dl>
        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Per Course</dt>
        <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">Accepting Ratio</dd>
      </dl>
    </div>

  
    <div id="bar-chart"></div>

      <script>
        const courseStatistics = {!! json_encode($courseStatistics) !!};
    </script>


    @push('scripts')
        @vite(['resources/js/histogram.js'])
    @endpush
  </div>
  
<section>
    <div class="lg:col-span-1 relative">
        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-4 z-20">
            <div class="course-items">
                <!-- 01 HTML -->
                @foreach ($course->courseInfo->content as $section => $lessons)
                    <div class="border-b border-gray-200">
                        <div class="py-3 flex justify-between items-center cursor-pointer course-header">
                            <div class="font-semibold text-blue-800">
                                {{ strtoupper($section) }}
                            </div>
                            <svg class="w-5 h-5 text-gray-500 chevron-down" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="pb-3 text-sm text-gray-600 course-content {{ $loop->first ? '' : 'hidden' }}">
                            @foreach ($lessons as $index => $lesson)
                                <div class="flex items-center py-1">
                                    <div class="w-3 h-3 rounded-full mr-2 bg-gray-300"></div>
                                    <span class="flex-1">{{ $lesson }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Repositioned orange image with adjusted z-index -->
        <div class="absolute bottom-0 -left-8 z-10 transform translate-y-1/2">
            <img src="{{ asset('img/renag.png') }}" class="h-auto w-[7rem]" alt="orange image">
        </div>
    </div>
</section>

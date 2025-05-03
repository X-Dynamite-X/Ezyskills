 @if ($courses->count() > 0)
     @foreach ($courses as $course)
         <div class="bg-[#003F7D] rounded-lg overflow-hidden flex flex-col h-full">
             <div class="p-8 flex justify-center flex-shrink-0"
             onclick="window.location='{{ route('courses.show', ['course' => $course->course->id]) }}'"

             >
                 <img src="{{ asset($course->image ? 'storage/' . $course->image : 'img/course/image 29.png') }}"
                     alt="Vue JS" class="h-16">
             </div>
             <div class="bg-white mt-auto p-6 rounded-t-3xl flex-grow">
                 <h3 class="text-2xl font-semibold text-center mb-4 ">{{ $course->course->title }}</h3>
                 <p class="text-gray-600 text-sm text-center mb-6">
                     {{ $course->course->description }}

                 </p>

                  <div class="flex gap-2 justify-center mb-4">
                     <button
                         class="flex items-center gap-2 px-4 py-2 border border-[#FF914C] rounded-lg hover:bg-[#FF914C] hover:text-white transition">
                         <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor">
                             <!-- Monitor SVG path -->
                             <path
                                 d="M0.179291 2.47984C0.179291 1.4967 0.976282 0.699707 1.95942 0.699707H16.2005C17.1836 0.699707 17.9806 1.4967 17.9806 2.47984V12.2706C17.9806 13.2537 17.1836 14.0507 16.2005 14.0507H9.97001V15.8308H12.6402C13.1318 15.8308 13.5303 16.2293 13.5303 16.7209C13.5303 17.2125 13.1318 17.611 12.6402 17.611H5.51968C5.02812 17.611 4.62962 17.2125 4.62962 16.7209C4.62962 16.2293 5.02812 15.8308 5.51968 15.8308H8.18988V14.0507H1.95942C0.976282 14.0507 0.179291 13.2537 0.179291 12.2706V2.47984ZM16.2005 12.2706V2.47984H1.95942V12.2706H16.2005Z" />
                         </svg>
                         Live Demo
                     </button>
                     <button
                         onclick="window.location='{{ route('student.show', ['enrollment' => $course->id]) }}'"
                         class="flex items-center gap-2 px-4 py-2 border border-[#FF914C] rounded-lg hover:bg-[#FF914C] hover:text-white transition">
                         Start Lirning
                     </button>
                 </div>
                 <button class="w-full bg-[#FF914C] text-white py-2 rounded-lg hover:bg-[#e87f3d] transition">
                     Download Curriculum
                 </button>
             </div>
         </div>
     @endforeach
 @else
     <div class="col-span-full flex flex-col items-center justify-center py-20 px-4">
         <div class="relative">
             <img src="{{ asset('img/404.png') }}" alt="No Courses Found" class="w-52 h-52 mb-6 opacity-90">
             <div
                 class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-24 h-24 bg-gradient-to-t   to-transparent">
             </div>
         </div>
         <h3 class="text-3xl font-bold text-[#003F7D] mb-3">No Courses Found</h3>
         <p class="text-gray-500 text-center max-w-md mb-8">We haven't added any courses that match your criteria yet.
             Please check back later or try different filters.</p>
         <form id="resetFiltersForm">
             <button type="button" id="resetFiltersBtn"
                 class="bg-[#FF914C] text-white px-8 py-3 rounded-lg hover:bg-[#e87f3d] transition-all duration-300 flex items-center gap-2">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                 </svg>
                 Reset Filters
             </button>
         </form>


     </div>
 @endif

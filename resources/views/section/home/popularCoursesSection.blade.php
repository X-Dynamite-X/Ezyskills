<!-- Popular Courses Section -->
<section class="py-16 px-8">
    <h2 class="text-4xl font-bold text-center mb-12">
        <span class="text-[#003F7D]">Popoular</span>
        <span class="text-[#FF914C]">Courses</span>
    </h2>

    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-8"> --}}
     <!-- Vue JS Card -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">


            @foreach ($courses as $course)
         <div class="bg-[#003F7D] rounded-lg overflow-hidden flex flex-col h-full">
             <div class="p-8 flex justify-center flex-shrink-0"
             @if($course->enrollments()->where('user_id', auth()->id())->exists() && Auth::check())
                 onclick="window.location='{{  route('student.show', ['enrollment' => $course->enrollments()->where('user_id', auth()->id())->first()->id]) }}'"
                 @else
                 onclick="window.location='{{ route('courses.show', ['course' => $course->id]) }}'"
             @endif


                 >
                 <img loading="lazy" src="{{ asset('storage/'. $course->image ? 'storage/' . $course->image : 'img/course/image 29.png') }}"
                     alt="Vue JS" class="h-16">
             </div>
             <div class="bg-white mt-auto p-6 rounded-t-3xl flex-grow">
                 <h3 class="text-2xl font-semibold text-center mb-4 ">{{ $course->title }}</h3>
                 <p class="text-gray-600 text-sm text-center mb-6">
                     {{ $course->description }}
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
                     @if($course->enrollments()->where('user_id', auth()->id())->exists())
                         <a
                         href="{{ route('student.show', ['enrollment' => $course->enrollments()->where('user_id', auth()->id())->first()->id]) }}"
                         class="flex items-center gap-2 px-4 py-2 border border-[#FF914C] rounded-lg hover:bg-[#FF914C] hover:text-white transition">
                         Start Lirning
                     </a>
                     @else
                      <button data-course-id="{{ $course->id }}" data-course-title="{{ $course->title }}"
                         data-course-price="{{ $course->pricing }}" data-course-description="{{ $course->description }}"
                         class="purchase-course-btn flex items-center gap-2 px-4 py-2 border border-[#FF914C] rounded-lg hover:bg-[#FF914C] hover:text-white transition buyCourseBtn">
                         Enroll Now
                     </button>
                     @endif
                 </div>
                 <button class="w-full bg-[#FF914C] text-white py-2 rounded-lg hover:bg-[#e87f3d] transition">
                     Download Curriculum
                 </button>
             </div>
         </div>
     @endforeach
        </div>
<div class="modal-container">
         @include('courses.model.create')
     </div>
</section>



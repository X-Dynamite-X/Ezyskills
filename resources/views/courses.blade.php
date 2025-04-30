@extends('layouts.app')
@section('title', 'Courses')


@section('main')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->

        <div class="mb-8">
            <h1 class="text-2xl font-bold">Courses <span class="text-[#FF914C]">list</span></h1>
            <!-- Search and Filters Section -->
            <div class="flex items-center gap-4 mt-4">
                <!-- Search Bar -->
                <div class="relative w-64">
                    <input type="text"
                           name="search"
                           placeholder="Search courses"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-[#FF914C] focus:ring focus:ring-[#FF914C] focus:ring-opacity-50">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="flex  border-gray-200 justify-self-center">
                    <button class="px-4 py-2 text-[#FF914C] border-b-2 border-[#FF914C]">Featured</button>
                    <button class="px-4 py-2 text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] transition-all">Coming Soon</button>
                    <button class="px-4 py-2 text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] transition-all">Archived</button>
                </div>


                <div class="flex gap-3 ml-auto">


                    <select class="px-4 py-2 rounded-lg border border-gray-300 focus:border-[#FF914C] focus:ring focus:ring-[#FF914C] focus:ring-opacity-50">

                        <option value="populer" selected>Popular</option>
                        <option value="all">all</option>
                     </select>
                </div>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">


            @foreach ($courses as $course)
                <div class="bg-[#003F7D] rounded-lg overflow-hidden flex flex-col h-full"
                    onclick="window.location='{{ route('courses.show', ['course' => $course->id]) }}'">
                    <div class="p-8 flex justify-center flex-shrink-0"
                        onclick="window.location='{{ route('courses.show', ['course' => $course->id]) }}'">
                        <img src="{{ asset('img/home/popularCourses/vue.png') }}" alt="Vue JS" class="h-16">
                    </div>
                    <div class="bg-white mt-auto p-6 rounded-t-3xl flex-grow"
                        onclick="window.location='{{ route('courses.show', ['course' => $course->id]) }}'">
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
                            <button
                                class="flex items-center gap-2 px-4 py-2 border border-[#FF914C] rounded-lg hover:bg-[#FF914C] hover:text-white transition">
                                Enroll Now
                            </button>
                        </div>
                        <button class="w-full bg-[#FF914C] text-white py-2 rounded-lg hover:bg-[#e87f3d] transition">
                            Download Curriculum
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center gap-2 mt-8">
            @for ($i = 1; $i <= 4; $i++)
                <div class="pagination-dot {{ $i === 1 ? 'active' : '' }}"></div>
            @endfor
        </div>
        {{ $courses->links() }}
    </div>
@endsection


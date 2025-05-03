@extends('layouts.app')
@section('title', 'My Courses')


@section('main')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->

        <div class="mb-8">
            <h1 class="text-2xl font-bold">Courses <span class="text-[#FF914C]">list</span></h1>
            <!-- Search and Filters Section -->
            <div class="flex items-center gap-4 flex-wrap">
                <!-- Search Bar -->
                <div class="relative w-64">
                    <input type="text" id="searchCourses" placeholder="Search courses"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-[#FF914C] focus:ring focus:ring-[#FF914C] focus:ring-opacity-50">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>


                <!-- Additional Filters -->
                <div class="flex gap-3 ml-auto">
                    <select id=""
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:border-[#FF914C] focus:ring focus:ring-[#FF914C] focus:ring-opacity-50">
                        <option value="popular">Popular</option>
                        <option value="all">All</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 corsesSection">

            @include('student.getCourses', ['courses' => $courses])

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

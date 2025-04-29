@extends('layouts.app')
@section('css')
@endsection("css")



@section('main')
    <section class="flex flex-col  md:flex-row items-center justify-between px-8 py-16 ">
        <div class="max-w-lg">
            <h2 class="text-4xl font-bold mb-4 text-blue-900">Skill Your Way Up To Success With Us</h2>
            <p class="mb-6 text-gray-600">Get Future skills you need for the workforce of work.</p>
            <div class="flex space-x-4">
                <input type="text" placeholder="Search Course" class="border rounded py-2 px-4 w-full">
                <button class="bg-[#003F7D] text-white py-2 px-6 rounded hover:bg-blue-700 transition">Search</button>


            </div>
            <div class="p-4  ">
                <button
                    class="bg-[#FF914C] text-white text-center rounded-lg w-[12rem] h-[3rem] m-2 hover:bg-[#ff913a] hover:text-white active:bg-[#FF914C]">
                    Cloud Computing
                </button>
                <button
                    class="bg-[#F2F4F8] text-gray-800 hover:bg-[#ff913a] hover:text-white m-2 text-center rounded-lg w-[12rem] h-[3rem] active:bg-[#FF914C] ">
                    Cyber Security
                </button>
                <button
                    class="bg-[#F2F4F8] text-gray-800 hover:bg-[#ff913a] hover:text-white m-2 text-center rounded-lg w-[12rem] h-[3rem] active:bg-[#FF914C] ">
                    DevOps
                </button>
                <button
                    class="bg-[#F2F4F8] text-gray-800 hover:bg-[#ff913a] hover:text-white m-2 text-center rounded-lg w-[12rem] h-[3rem] active:bg-[#FF914C] ">
                    Data Science
                </button>
                <button
                    class="bg-[#F2F4F8] text-gray-800 hover:bg-[#ff913a] hover:text-white m-2 text-center rounded-lg w-[12rem] h-[3rem] active:bg-[#FF914C] ">
                    Software Testing
                </button>

            </div>
        </div>
        <div>
            @include('layouts.svg.home.scrol')
        </div>
    </section>
    <div id="moreSections" class="bg-white">
        @include('section.home.features')
        @include("section.home.skillDevelopment")
        @include('section.home.howItWorks')
        @include('section.home.popularCoursesSection')
        @include("section.home.achievementsSection")
        @include('section.home.mentorsSection')
        @include("section.home.certificationsSection")
    </div>
@endsection("main")

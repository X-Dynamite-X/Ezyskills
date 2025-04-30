 @extends('layouts.app')
 @section('title')
     {{ $course->title }} Course
 @endsection

 @section('css')
 @endsection

 @section('main')
     <!-- Hero Section with improved design -->
     @include('section.corses.ferstSection',compact('course'))

     <div class="container mx-auto px-4">



         <!-- Main Content Grid -->
         <div class="grid grid-cols-1 lg:grid-cols-3  ">
             <!-- Left Content -->

             <div class="lg:col-span-2 w-full">
                 @include('section.corses.rightSidebar' ,compact('course'))
             </div>
             @include('section.corses.courseContent',compact('course'))

             <!-- Right Sidebar -->

         </div>


         @include('section.corses.projects',compact('course'))
     </div>
 @endsection

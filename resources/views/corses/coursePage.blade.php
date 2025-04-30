 @extends('layouts.app')
 @section('title')
     Angular JS Course
 @endsection

 @section('css')
 @endsection

 @section('main')
     <!-- Hero Section with improved design -->
     @include('section.corses.ferstSection')

     <div class="container mx-auto px-4">



         <!-- Main Content Grid -->
         <div class="grid grid-cols-1 lg:grid-cols-3  ">
             <!-- Left Content -->

             <div class="lg:col-span-2 w-full">
                 @include('section.corses.rightSidebar')
             </div>
             @include('section.corses.courseContent')

             <!-- Right Sidebar -->

         </div>


         @include('section.corses.projects')
     </div>
     
 @endsection

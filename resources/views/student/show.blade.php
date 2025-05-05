 @extends('layouts.app')
 @section('title')
     {{ $enrollment->course->title }} Course
 @endsection

 @section('css')
     <style>
         .rating-stars input:checked~label,
         .rating-stars label:hover,
         .rating-stars label:hover~label {
             color: #fbbf24;
             /* لون النجوم عند التحديد أو التحويم */
         }
     </style>
 @endsection

 @section('main')
     <!-- Hero Section with improved design -->
     @include('student.corses.ferstSection', compact('enrollment'))

     <div class="container mx-auto px-4">



         <!-- Main Content Grid -->
         <div class="grid grid-cols-1 lg:grid-cols-3  ">
             <!-- Left Content -->

             <div class="lg:col-span-2 w-full">
                 @include('student.corses.rightSidebar', compact('enrollment'))
             </div>
             @include('student.corses.courseContent', compact('enrollment'))

             <!-- Right Sidebar -->

         </div>


         @include('student.corses.projects', compact('enrollment'))
         @include('student.rating',compact( 'rating'))

     </div>
 @endsection
 
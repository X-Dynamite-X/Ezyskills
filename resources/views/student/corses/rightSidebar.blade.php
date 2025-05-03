 <section class="py-8 px-6 w-full">
     <div class="flex items-center gap-4 w-full mb-8">
         <h2 class="text-[#FF914C] text-2xl font-bold whitespace-nowrap">About The Course</h2>
         <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
     </div>
     <div>
         <div>
            @ 
             <p class="text-gray-700">
                {{ $enrollment->course->courseInfo->about }}
             </p>
         </div>
     </div>
 </section>
 <section class="py-8 px-6">

     <div class="flex items-center gap-4">
         <h2 class="text-[#FF914C] text-2xl font-bold whitespace-nowrap"> Objectives</h2>
         <div class="h-[2px] bg-[#FF914C] w-full"></div>
     </div>
     <div>

         @foreach ($enrollment->course->courseInfo->objectives as $topic)
             <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                 <div class="bg-green-100 p-2 rounded-full mt-1">
                     <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                     </svg>
                 </div>
                 <p class="text-gray-700">{{ $topic }}</p>
             </div>
         @endforeach
     </div>





 </section>


 {{--


--}}

   <div id="step3" class="step-content p-6">
       <h2 class="text-xl font-semibold mb-6">Course Content</h2>
       <p class="text-gray-600 mb-4">Organize your course content into sections and lessons.</p>

       <div id="content-sections-container">
           <!-- Content section template -->
           @foreach ($course->courseInfo->content as $sectionName => $lessons)
               <div class="content-section mb-6 p-4 border border-gray-200 rounded-lg">
                   <div class="flex justify-between items-center mb-3">
                       <input type="text" name="content_sections[]" value="{{ $sectionName }}"
                           class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-xs"
                           placeholder="Section name (e.g. HTML, CSS, JavaScript)">
                       <button type="button" class="remove-section text-red-500 hover:text-red-700"
                           title="Remove section">
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                           </svg>
                       </button>
                   </div>

                   <h4 class="text-sm font-medium text-gray-700 mb-2">Lessons:</h4>
                   @foreach ($lessons as $lesson)
                       <div class="lessons-container">

                           <div class="lesson-item flex items-center mb-2">
                               <input type="text" name="lessons[0][]" value="{{ $lesson }}"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                                   placeholder="Lesson title">
                               <button type="button" class="remove-lesson ml-2 text-red-500 hover:text-red-700"
                                   title="Remove lesson">
                                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                           d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                   </svg>
                               </button>

                           </div>
                        </div>
                        @endforeach

               <button type="button"
                   class="add-lesson mt-2 px-4 py-2 mp-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm flex items-center">
                   <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                   Add Lesson
               </button>
       </div>
       @endforeach

   </div>

   <button type="button" id="add-content-section"
       class="mt-3 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
       <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
       </svg>
       Add Content Section
   </button>

   <div class="mt-8 flex justify-between">
       <button type="button" id="step3-prev"
           class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
           Previous
       </button>
       <button type="button" id="step3-next"
           class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
           Next: Projects
       </button>
   </div>
   </div>

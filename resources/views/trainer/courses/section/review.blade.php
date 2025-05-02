  <div id="step4" class="tab-content p-6">
      <h2 class="text-xl font-semibold mb-6 text-[#003F7D]">Review Your Course</h2>

      <div class="bg-gray-50 p-6 rounded-lg mb-6">
          <div class="flex flex-col md:flex-row gap-6">
              <div class="md:w-1/3">
                  <div id="review-image-edit"
                      class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center">

                      @if (isset($course) && $course->image)
                          <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                              class="w-full h-full object-cover">
                      @else
                          <span class="text-gray-400">No image selected</span>
                      @endif
                  </div>
              </div>

              <div class="md:w-2/3">
                  <h3 id="review-title" class="text-2xl font-bold text-gray-800 mb-2">
                      {{ isset($course) ? $course->title : 'Course Title' }}
                  </h3>
                  <div class="flex items-center mb-4">
                      <span id="review-status"
                          class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mr-3">
                          {{ isset($course) ? $course->status : 'Status' }}
                      </span>
                      <span id="review-pricing"
                          class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                          ${{ isset($course) ? number_format($course->pricing, 2) : '0.00' }}
                      </span>
                  </div>
                  <p id="review-description" class="text-gray-600 mb-4">
                      {{ isset($course) ? $course->description : 'Course description will appear here.' }}
                  </p>
                  <p id="review-about" class="text-gray-600">
                      {{ isset($course) && isset($course->courseInfo->about) ? $course->courseInfo->about : 'Detailed course description will appear here.' }}
                  </p>
              </div>
          </div>
      </div>



      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <!-- Objectives Review -->
          <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <h4 class="font-semibold text-[#FF914C] mb-3">Course Objectives</h4>
              <ul id="review-objectives-edit" class="list-disc pl-5 space-y-1 text-gray-600">

                  @foreach ($course->courseInfo->objectives as $objective)
                      <li>{{ $objective }}</li>
                  @endforeach

              </ul>
          </div>

          <!-- Content Sections Review -->
          <div class="bg-white p-4 border border-gray-200 rounded-lg">
              <h4 class="font-semibold text-[#FF914C] mb-3">Course Content</h4>
              <div id="review-content-edit" class="text-gray-600">

                  @foreach ($course->courseInfo->content as $sectionName => $lessons)
                      <div class="mb-4">
                          <h5 class="font-semibold text-[#FF914C]">{{ $sectionName }}</h5>
                          <ul class="list-disc pl-5 space-y-1 text-gray-600">
                              @if (is_array($lessons) && count($lessons) > 0)
                                  @foreach ($lessons as $lesson)
                                      <li>{{ $lesson }}</li>
                                  @endforeach
                              @else
                                  <li>No lessons added yet.</li>
                              @endif
                          </ul>
                      </div>
                  @endforeach

              </div>
          </div>
      </div>

      <!-- Projects Review -->
      <div class="bg-white p-4 border border-gray-200 rounded-lg mb-6">
          <h4 class="font-semibold text-[#FF914C] mb-3">Projects</h4>
          <div id="review-projects-edit" class="text-gray-600">

              @foreach ($course->courseInfo->projects as $projectTitle => $details)
                  <div class="mb-4">
                      <h5 class="font-semibold text-[#FF914C]">{{ $projectTitle }}</h5>
                      <ul class="list-disc pl-5 space-y-1 text-gray-600">
                          @if (is_array($details) && count($details) > 0)
                              @foreach ($details as $detail)
                                  <li>{{ $detail }}</li>
                              @endforeach
                          @else
                              <li>No project details added yet.</li>
                          @endif
                      </ul>
                  </div>
              @endforeach

          </div>
      </div>

      <div class="mt-8 flex justify-between">
          <button type="button" id="step4-prev"
              class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
              Previous
          </button>
          <button type="submit" id="create-course"
              class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
              {{ isset($course) ? 'Update Course' : 'Create Course' }}
          </button>
      </div>
  </div>

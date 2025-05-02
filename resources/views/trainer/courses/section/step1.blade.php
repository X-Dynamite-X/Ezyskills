  <div id="step1" class="step-content active p-6">
      <h2 class="text-xl font-semibold mb-6">Basic Course Information</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="col-span-2">
              <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Course Title</label>
              <input type="text" name="title" id="title"
                  class="w-full px-4 py-2 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                  placeholder="e.g. Angular JS Fundamentals" value="{{ $course->title }}" required>
              @error('title')
                  <p class="error-message">{{ $message }}</p>
              @enderror
          </div>

          <div class="col-span-2">
              <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
              <textarea name="description" id="description" rows="3"
                  class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                  placeholder="Brief description of your course" required>{{ $course->description }}</textarea>
              @error('description')
                  <p class="error-message">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label for="pricing" class="block text-sm font-medium text-gray-700 mb-1">pricing ($)</label>
              <input type="number" name="pricing" id="prpricingice" min="0" step="0.01"
                  class="w-full px-4 py-2 border @error('pricing') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                  placeholder="e.g. 29.99" value="{{ $course->pricing }}" required>
              @error('pricing')
                  <p class="error-message">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
              <select name="status" id="status"
                  class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                  required>
                  <option value="">Select status</option>
                  <option value="Opened" {{ $course->status == 'Opened' ? 'selected' : '' }}>Opened</option>
                  <option value="Coming Soon" {{ $course->status == 'Coming Soon' ? 'selected' : '' }}>Coming Soon
                  </option>
                  <option value="Archived" {{ $course->status == 'Archived' ? 'selected' : '' }}>Archived</option>
              </select>
              @error('status')
                  <p class="error-message">{{ $message }}</p>
              @enderror
          </div>

          <div class="col-span-2">
              <label for="about" class="block text-sm font-medium text-gray-700 mb-1">Detailed Description
                  (About)</label>
              <textarea name="about" id="about" rows="5"
                  class="w-full px-4 py-2 border @error('about') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                  placeholder="Detailed description of your course">{{ $course->description }}</textarea>
              @error('about')
                  <p class="error-message">{{ $message }}</p>
              @enderror
          </div>

          <div class="col-span-2">
              <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Course Image</label>
              <div class="flex items-center space-x-4">
                  <div class="flex-1">
                      <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg"
                          class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]">
                      @error('image')
                          <p class="error-message">{{ $message }}</p>
                      @enderror
                  </div>
                  <div id="image-preview" class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                      <span class="text-gray-400 text-xs text-center">Preview</span>
                  </div>
              </div>
          </div>
      </div>

      <div class="mt-8 flex justify-end">
          <button type="button" id="step1-next"
              class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
              Next: Objectives
          </button>
      </div>
  </div>

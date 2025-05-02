  <div id="step2" class="step-content p-6">
                <h2 class="text-xl font-semibold mb-6">Course Objectives</h2>
                <p class="text-gray-600 mb-4">What will students learn in this course? Add at least 3 objectives.</p>
                
                <div id="objectives-container">
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Learn the fundamentals of Angular.js">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Build real-world applications with Angular.js">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Master advanced Angular.js concepts">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <button type="button" id="add-objective"
                    class="mt-3 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Objective
                </button>
                
                <div class="mt-8 flex justify-between">
                    <button type="button" id="step2-prev"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Previous
                    </button>
                    <button type="button" id="step2-next"
                        class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                        Next: Content
                    </button>
                </div>
            </div>
  <div id="step4" class="tab-content p-6">
                <h2 class="text-xl font-semibold mb-6 text-[#003F7D]">Review Your Course</h2>

                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/3">
                            <div id="review-image"
                                class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400">
                                <span>No image selected</span>
                            </div>
                        </div>

                        <div class="md:w-2/3">
                            <h3 id="review-title" class="text-2xl font-bold text-gray-800 mb-2">Course Title</h3>
                            <div class="flex items-center mb-4">
                                <span id="review-status"
                                    class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mr-3">Status</span>
                                <span id="review-pricing"
                                    class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">$0.00</span>
                            </div>
                            <p id="review-description" class="text-gray-600 mb-4">Course description will appear here.
                            </p>
                            <p id="review-about" class="text-gray-600">Detailed course description will appear here.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Objectives Review -->
                    <div class="bg-white p-4 border border-gray-200 rounded-lg">
                        <h4 class="font-semibold text-[#FF914C] mb-3">Course Objectives</h4>
                        <ul id="review-objectives" class="list-disc pl-5 space-y-1 text-gray-600">
                            <li>No objectives added yet.</li>
                        </ul>
                    </div>

                    <!-- Content Sections Review -->
                    <div class="bg-white p-4 border border-gray-200 rounded-lg">
                        <h4 class="font-semibold text-[#FF914C] mb-3">Course Content</h4>
                        <div id="review-content" class="text-gray-600">
                            <p>No content sections added yet.</p>
                        </div>
                    </div>
                </div>

                <!-- Projects Review -->
                <div class="bg-white p-4 border border-gray-200 rounded-lg mb-6">
                    <h4 class="font-semibold text-[#FF914C] mb-3">Projects</h4>
                    <div id="review-projects" class="text-gray-600">
                        <p>No projects added yet.</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" id="step4-prev"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Previous
                    </button>
                    <button type="submint" id="create-course"
                        class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                        Create Course
                    </button>
                </div>
            </div>
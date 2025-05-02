    <div id="step4" class="step-content p-6">
                <h2 class="text-xl font-semibold mb-6">Course Projects</h2>
                <p class="text-gray-600 mb-4">Add projects that students will complete during the course.</p>

                <div id="projects-container">
                    <!-- Project template -->
                    <div class="project-item mb-6 p-4 border border-gray-200 rounded-lg">
                        <div class="flex justify-between items-center mb-3">
                            <input type="text" name="project_titles[]"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-md"
                                placeholder="Project title">
                            <button type="button" class="remove-project text-red-500 hover:text-red-700"
                                title="Remove project">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>

                        <div class="project-details-container">
                            <div class="project-detail-item flex items-center mb-2">
                                <input type="text" name="project_details[0][]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                                    placeholder="Project detail or task">
                                <button type="button" class="remove-project-detail ml-2 text-red-500 hover:text-red-700"
                                    title="Remove detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button type="button"
                            class="add-project-detail mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Project Detail
                        </button>
                    </div>
                </div>

                <button type="button" id="add-project" class="mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Another Project
                </button>
            </div>
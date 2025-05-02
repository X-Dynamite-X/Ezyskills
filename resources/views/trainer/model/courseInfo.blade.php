
<div id="courseInfoModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center   bg-opacity-50">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t bg-[#003F7D] text-white">
                <h3 class="text-xl font-semibold" id="course-info-title">
                    Course Information
                </h3>
                <button type="button" class="close-info-modal text-white bg-transparent hover:bg-[#002a54] hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 overflow-y-auto max-h-[70vh]">
                <!-- Course Basic Info -->
                <div class="flex flex-col md:flex-row gap-6 pb-6 border-b border-gray-200">
                    <div class="md:w-1/4">
                        <div class="bg-[#003F7D] p-4 rounded-lg flex justify-center items-center">
                            <img id="course-info-image" src="" alt="Course Image" class="h-24 w-auto">
                        </div>
                    </div>
                    <div class="md:w-3/4">
                        <div class="flex justify-between items-start mb-2">
                            <h2 id="course-info-title-text" class="text-2xl font-bold text-gray-800"></h2>
                            <span id="course-info-status" class="px-3 py-1 text-xs font-semibold rounded-full"></span>
                        </div>
                        <p id="course-info-description" class="text-gray-600 mb-4"></p>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF914C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span id="course-info-price" class="font-medium"></span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF914C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span id="course-info-created" class="font-medium"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div class="py-4 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <h3 class="text-[#FF914C] text-xl font-bold whitespace-nowrap">About The Course</h3>
                        <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
                    </div>
                    <p id="course-info-about" class="text-gray-700"></p>
                </div>

                <!-- Objectives Section -->
                <div class="py-4 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <h3 class="text-[#FF914C] text-xl font-bold whitespace-nowrap">Objectives</h3>
                        <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
                    </div>
                    <div id="course-info-objectives" class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <!-- Objectives will be inserted here -->
                    </div>
                </div>

                <!-- Content Section -->
                <div class="py-4 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <h3 class="text-[#FF914C] text-xl font-bold whitespace-nowrap">Course Content</h3>
                        <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
                    </div>
                    <div id="course-info-content" class="space-y-4">
                        <!-- Content sections will be inserted here -->
                    </div>
                </div>

                <!-- Projects Section -->
                <div class="py-4">
                    <div class="flex items-center gap-4 mb-4">
                        <h3 class="text-[#FF914C] text-xl font-bold whitespace-nowrap">Projects</h3>
                        <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
                    </div>
                    <div id="course-info-projects" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Projects will be inserted here -->
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b">
                <div class="text-sm text-gray-500">
                    <span id="course-info-updated">Last updated: </span>
                </div>
                <button type="button" class="close-info-modal text-white bg-[#FF914C] hover:bg-[#FF6B1A] focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


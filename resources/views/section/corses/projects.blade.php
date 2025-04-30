<section class="py-8 px-6 w-full">
    <div class="flex items-center gap-4 w-full mb-8">
        <h2 class="text-[#FF914C] text-2xl font-bold whitespace-nowrap">Angular JS Projects</h2>
        <div class="h-[2px] bg-[#FF914C] flex-grow"></div>
    </div>

    @php
        $angularProjects = [
            'Angular Hello World Project',
            'Angular Routing Project',
            'Angular Forms Project',
            'Angular Services Project',
            'Angular HTTP Project',
            'Angular Components Project',
        ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($angularProjects as $project)
            <div class="project-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
                <div class="flex items-center p-4">
                    <div class="bg-[#FF914C]/10 p-2 rounded-full mr-3">
                        <svg class="w-5 h-5 text-[#FF914C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-base font-semibold text-gray-800">{{ $project }}</h3>
                        <p class="text-gray-500 text-xs mt-1 project-details hidden">Click to view project details</p>
                    </div>
                    <div class="ml-3 transform transition-transform duration-300 arrow-icon">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

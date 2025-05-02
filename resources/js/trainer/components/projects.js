// Projects functionality
import $ from "jquery";
export function initProjects() {
    // Add project detail
    function addProjectDetail(project, projectIndex) {
        const newDetail = $(`
            <div class="project-detail-item flex items-center mb-2">
                <input type="text" name="project_details[${projectIndex}][]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]" placeholder="Project detail or task">
                <button type="button" class="remove-project-detail ml-2 text-red-500 hover:text-red-700" title="Remove detail">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `);
        project.find('.project-details-container').append(newDetail);

        // Add event listener to the new remove button
        newDetail.find('.remove-project-detail').on('click', function() {
            const detailsContainer = $(this).closest('.project-details-container');
            if (detailsContainer.find('.project-detail-item').length > 1) {
                $(this).closest('.project-detail-item').remove();
            }
        });
    }

    // Add project
    $('#add-project').on('click', function() {
        const projectCount = $('#projects-container .project-item').length;
        const newProject = $(`
            <div class="project-item mb-6 p-4 border border-gray-200 rounded-lg">
                <div class="flex justify-between items-center mb-3">
                    <input type="text" name="project_titles[]" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-md" placeholder="Project title">
                    <button type="button" class="remove-project text-red-500 hover:text-red-700" title="Remove project">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>

                <div class="project-details-container">
                    <div class="project-detail-item flex items-center mb-2">
                        <input type="text" name="project_details[${projectCount}][]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]" placeholder="Project detail or task">
                        <button type="button" class="remove-project-detail ml-2 text-red-500 hover:text-red-700" title="Remove detail">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="button" class="add-project-detail mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Project Detail
                </button>
            </div>
        `);
        $('#projects-container').append(newProject);

        // Add event listeners to the new buttons
        newProject.find('.remove-project').on('click', function() {
            $(this).closest('.project-item').remove();
        });

        newProject.find('.add-project-detail').on('click', function() {
            addProjectDetail($(this).closest('.project-item'), projectCount);
        });

        newProject.find('.remove-project-detail').on('click', function() {
            const detailsContainer = $(this).closest('.project-details-container');
            if (detailsContainer.find('.project-detail-item').length > 1) {
                $(this).closest('.project-detail-item').remove();
            }
        });
    });

    // Remove project (for existing buttons)
    $(document).on('click', '.remove-project', function() {
        $(this).closest('.project-item').remove();
    });

    // Remove project detail (for existing buttons)
    $(document).on('click', '.remove-project-detail', function() {
        const detailsContainer = $(this).closest('.project-details-container');
        if (detailsContainer.find('.project-detail-item').length > 1) {
            $(this).closest('.project-detail-item').remove();
        }
    });

    // FIX: Add event listener for the initial "Add Project Detail" buttons
    // This is the key fix for the first project's "Add Project Detail" button
    $(document).on('click', '.add-project-detail', function() {
        const project = $(this).closest('.project-item');
        const projectIndex = $('#projects-container .project-item').index(project);
        addProjectDetail(project, projectIndex);
    });
}



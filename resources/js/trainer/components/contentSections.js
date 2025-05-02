// Course content sections functionality
import $ from "jquery";

export function initContentSections() {
    // Add lesson function
    function addLesson(section, sectionIndex) {
        const newLesson = $(`
            <div class="lesson-item flex items-center mb-2">
                <input type="text" name="lessons[${sectionIndex}][]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]" placeholder="Lesson title">
                <button type="button" class="remove-lesson ml-2 text-red-500 hover:text-red-700" title="Remove lesson">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `);
        section.find('.lessons-container').append(newLesson);

        // Add event listener to the new remove button
        newLesson.find('.remove-lesson').on('click', function() {
            const lessonsContainer = $(this).closest('.lessons-container');
            if (lessonsContainer.find('.lesson-item').length > 1) {
                $(this).closest('.lesson-item').remove();
            }
        });

        // Update review section after adding a lesson
        if (typeof updateReviewSection === 'function') {
            updateReviewSection();
        }
    }

    // Add content section
    $('#add-content-section').on('click', function() {
        const sectionCount = $('#content-sections-container .content-section').length;
        const newSection = $(`
            <div class="content-section mb-6 p-4 border border-gray-200 rounded-lg">
                <div class="flex justify-between items-center mb-3">
                    <input type="text" name="content_sections[]" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-xs" placeholder="Section name (e.g. HTML, CSS, JavaScript)">
                    <button type="button" class="remove-section text-red-500 hover:text-red-700" title="Remove section">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>

                <div class="lessons-container">
                    <div class="lesson-item flex items-center mb-2">
                        <input type="text" name="lessons[${sectionCount}][]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]" placeholder="Lesson title">
                        <button type="button" class="remove-lesson ml-2 text-red-500 hover:text-red-700" title="Remove lesson">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="button" class="add-lesson mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Lesson
                </button>
            </div>
        `);
        $('#content-sections-container').append(newSection);

        // Add event listeners to the new buttons
        newSection.find('.remove-section').on('click', function() {
            $(this).closest('.content-section').remove();
        });

        newSection.find('.add-lesson').on('click', function() {
            addLesson($(this).closest('.content-section'), sectionCount);
        });

        newSection.find('.remove-lesson').on('click', function() {
            const lessonsContainer = $(this).closest('.lessons-container');
            if (lessonsContainer.find('.lesson-item').length > 1) {
                $(this).closest('.lesson-item').remove();
            }
        });
    });

    // Remove section (for existing buttons)
    $(document).on('click', '.remove-section', function() {
        $(this).closest('.content-section').remove();
    });

    // Remove lesson (for existing buttons)
    $(document).on('click', '.remove-lesson', function() {
        const lessonsContainer = $(this).closest('.lessons-container');
        if (lessonsContainer.find('.lesson-item').length > 1) {
            $(this).closest('.lesson-item').remove();
        }
    });

    // Add event listener for the initial "Add Lesson" buttons
    $(document).on('click', '.add-lesson', function() {
        const section = $(this).closest('.content-section');
        const sectionIndex = $('#content-sections-container .content-section').index(section);
        addLesson(section, sectionIndex);
    });

    return { addLesson };
}

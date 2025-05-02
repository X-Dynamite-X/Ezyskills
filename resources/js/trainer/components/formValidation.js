// Form validation functionality
import $ from "jquery";

export function initFormValidation() {
    // Form validation
    $('#course-form').on('submit', function (e) {
        let isValid = true;
        const requiredFields = [
            { id: 'title', name: 'Title' },
            { id: 'description', name: 'Short Description' },
            { id: 'about', name: 'About Course' },
            { id: 'pricing', name: 'pricing' },
            { id: 'image', name: 'Course Image' },
        ];

        // Check required fields
        requiredFields.forEach(field => {
            const input = $(`#${field.id}`);
            const errorMsg = $(`#${field.id}-error`);

            if (!input.val() && (field.id !== 'image' || !$('#image-preview').attr('src'))) {
                isValid = false;
                input.addClass('border-red-500');
                errorMsg.text(`${field.name} is required`).removeClass('hidden');
            } else {
                input.removeClass('border-red-500');
                errorMsg.addClass('hidden');
            }
        });

        // Check if at least one objective is added
        if ($('#objectives-container .objective-item').length === 0) {
            isValid = false;
            $('#objectives-error').text('At least one learning objective is required').removeClass('hidden');
        } else {
            $('#objectives-error').addClass('hidden');
        }

        // Check if at least one content section is added
        if ($('#content-sections-container .content-section').length === 0) {
            isValid = false;
            $('#content-sections-error').text('At least one content section is required').removeClass('hidden');
        } else {
            $('#content-sections-error').addClass('hidden');
        }

        if (!isValid) {
            e.preventDefault();
            // Scroll to the first error
            const firstError = $('.border-red-500, .text-red-500:not(.hidden)').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }
        }
    });

    // Clear validation errors on input
    $(document).on('input', 'input, textarea, select', function() {
        $(this).removeClass('border-red-500');
        $(`#${$(this).attr('id')}-error`).addClass('hidden');
    });
}

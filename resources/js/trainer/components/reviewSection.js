// Review section functionality
import $ from "jquery";

export function initReviewSection() {
    // Update review section
    function updateReviewSection() {
        // Basic info
        $('#review-title').text($('#title').val() || 'Course Title');
        $('#review-description').text($('#description').val() || 'Course description will appear here.');
        $('#review-about').text($('#about').val() || 'Detailed course description will appear here.');
        $('#review-price').text('$' + ($('#price').val() || '0.00'));
        
        const status = $('#status').val();
        $('#review-status').text(status || 'Draft');
        
        // Course image
        const imagePreview = $('#image-preview');
        const reviewImage = $('#review-image');
        if (imagePreview.attr('src') && imagePreview.attr('src') !== '#') {
            reviewImage.attr('src', imagePreview.attr('src'));
            reviewImage.removeClass('hidden');
            $('#review-image-placeholder').addClass('hidden');
        } else {
            reviewImage.addClass('hidden');
            $('#review-image-placeholder').removeClass('hidden');
        }
        
        // Objectives
        const objectives = $('#objectives-container input[name="objectives[]"]');
        const reviewObjectives = $('#review-objectives');
        if (objectives.length > 0) {
            reviewObjectives.empty();
            objectives.each(function() {
                if ($(this).val()) {
                    reviewObjectives.append(`<li>${$(this).val()}</li>`);
                }
            });
        } else {
            reviewObjectives.html('<li>No objectives added yet.</li>');
        }
        
        // Content sections
        const contentSections = $('#content-sections-container .content-section');
        const reviewContent = $('#review-content');
        if (contentSections.length > 0) {
            reviewContent.empty();
            contentSections.each(function() {
                const sectionName = $(this).find('input[name="content_sections[]"]').val();
                const lessons = $(this).find('input[name^="lessons"]');
                const sectionDiv = $('<div>').addClass('mb-4');
                
                let lessonsHtml = '';
                lessons.each(function() {
                    if ($(this).val()) {
                        lessonsHtml += `<li>${$(this).val()}</li>`;
                    }
                });
                
                sectionDiv.html(`
                    <h5 class="font-semibold text-[#FF914C]">${sectionName || 'Unnamed Section'}</h5>
                    <ul class="list-disc pl-5 space-y-1 text-gray-600">
                        ${lessonsHtml || '<li>No lessons added yet.</li>'}
                    </ul>
                `);
                reviewContent.append(sectionDiv);
            });
        } else {
            reviewContent.html('<p>No content sections added yet.</p>');
        }
        
        // Projects
        const projects = $('#projects-container .project-item');
        const reviewProjects = $('#review-projects');
        if (projects.length > 0) {
            reviewProjects.empty();
            projects.each(function() {
                const projectName = $(this).find('input[name="project_titles[]"]').val();
                const projectDetails = $(this).find('input[name^="project_details"]');
                const projectDiv = $('<div>').addClass('mb-4');
                
                let detailsHtml = '';
                projectDetails.each(function() {
                    if ($(this).val()) {
                        detailsHtml += `<li>${$(this).val()}</li>`;
                    }
                });
                
                projectDiv.html(`
                    <h5 class="font-semibold text-[#FF914C]">${projectName || 'Unnamed Project'}</h5>
                    <ul class="list-disc pl-5 space-y-1 text-gray-600">
                        ${detailsHtml || '<li>No project details added yet.</li>'}
                    </ul>
                `);
                reviewProjects.append(projectDiv);
            });
        } else {
            reviewProjects.html('<p>No projects added yet.</p>');
        }
    }

    // Update review when inputs change
    $(document).on('input', 'input, textarea, select', function() {
        updateReviewSection();
    });

    // Update review when image changes
    $(document).on('change', '#image', function() {
        // The image preview is handled by imagePreview.js
        // We just need to make sure updateReviewSection is called after the preview is updated
        setTimeout(updateReviewSection, 100);
    });

    // Initial update
    updateReviewSection();

    return { updateReviewSection };
}



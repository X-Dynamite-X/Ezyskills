// Image preview functionality
import $ from "jquery";

export function initImagePreview() {
    // Image preview
    $('#image').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview-container').removeClass('hidden');
                $('#image-placeholder').addClass('hidden');
                
                // Update review section if available
                if (window.updateReviewSection) {
                    window.updateReviewSection();
                }
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Remove image
    $('#remove-image').on('click', function() {
        $('#image').val('');
        $('#image-preview').attr('src', '#');
        $('#image-preview-container').addClass('hidden');
        $('#image-placeholder').removeClass('hidden');
        
        // Update review section if available
        if (window.updateReviewSection) {
            window.updateReviewSection();
        }
    });
}


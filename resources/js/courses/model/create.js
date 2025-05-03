import $, { data } from "jquery";

$(document).ready(function () {
    // Open course purchase modal
    $(document).on("click", ".purchase-course-btn", function () {
        const courseId = $(this).data("course-id");
        const courseTitle = $(this).data("course-title");
        const coursePrice = $(this).data("course-price");
        const courseDescription = $(this).data("course-description");
        const courseImage = $(this).data("course-image");

        // Set course data in modal
        $("#courseId").val(courseId);
        $("#course-title-preview").text(courseTitle);
        $("#course-price-preview").text(coursePrice);
        $("#course-description-preview").text(courseDescription);
        $("#course-image-preview").attr("src", courseImage);

        // Reset status message
        $("#purchase-status")
            .addClass("hidden")
            .removeClass("bg-green-100 text-green-800 bg-red-100 text-red-800")
            .text("");

        // Show modal
        $("#courseConfirmModal").removeClass("hidden");
    });

    // Close modal
    $(".close-confirm-modal").click(function () {
        $("#courseConfirmModal").addClass("hidden");
    });


    // Handle purchase confirmation
    $("#confirmPurchase").click(function () {
        const courseId = $("#courseId").val();
        const button = $(this);

        // Disable button and show loading state
        button
            .prop("disabled", true)
            .html(
                '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...'
            );

        $.ajax({
            url: `student/${courseId}`,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // Show success message
                const myCredit = $("#mycredit").data("credit");
                window.location.href = response.redirect;
                if (myCredit >= 1) {
                    $("#mycredit")
                        .data("credit", myCredit - 1)
                        .text(myCredit - 1 + "Credits");
                }
                $("#purchase-status")
                    .removeClass("hidden bg-red-100 text-red-800")
                    .addClass("bg-green-100 text-green-800")
                    .text(response.message || "Course purchased successfully!");

                // Reset button
                button.prop("disabled", false).text("Confirm Purchase");

                // Close modal after delay and redirect if needed
                setTimeout(function () {
                    $("#courseConfirmModal").addClass("hidden");
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        // Refresh the course list or update UI as needed
                        window.location.reload();
                    }
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Show error message
                const errorMessage =
                    xhr.responseJSON?.message ||
                    "An error occurred during purchase. Please try again.";
                $("#purchase-status")
                    .removeClass("hidden bg-green-100 text-green-800")
                    .addClass("bg-red-100 text-red-800")
                    .text(errorMessage);

                // Reset button
                button.prop("disabled", false).text("Confirm Purchase");

                console.error("Purchase error:", error);
            },
        });
    });
});

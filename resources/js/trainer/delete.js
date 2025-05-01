import $ from "jquery";


$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $(document).on("click", ".delete-user-btn", function () {
        const userId = $(this).data("user-id");
        $("#userIdToDelete").val(userId);
        $("#deleteConfirmModal").removeClass("hidden");
    });

    // Close delete modal
    $(".close-delete-modal").click(function () {
        $("#deleteConfirmModal").addClass("hidden");
    });

    // Handle delete confirmation
    $("#confirmDelete").click(function () {
        const userId = $("#userIdToDelete").val();

        $.ajax({
            url: `/admin/users/${userId}`,
            method: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // Close modal
                $("#deleteConfirmModal").addClass("hidden");

                // Update the table
                $("#user_" + userId).remove();

                // Show success notification
                showNotification("User deleted successfully", "success");
            },
            error: function (xhr) {
                // Show error notification
                const errorMessage =
                    xhr.responseJSON?.message ||
                    "An error occurred while deleting the user";
                showNotification(errorMessage, "error");

                // Close modal
                $("#deleteConfirmModal").addClass("hidden");
            },
        });
    });

    // Optional: Close modal when clicking outside
    $(window).click(function (e) {
        if ($(e.target).is("#deleteConfirmModal")) {
            $("#deleteConfirmModal").addClass("hidden");
        }
    });
});
function showNotification(message, type = "success") {
    const bgColor = type === "success" ? "bg-green-500" : "bg-red-500";

    const notification = $(`
        <div class="fixed top-4 right-4 z-50 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg transition-opacity duration-300">
            ${message}
        </div>
    `).appendTo("body");

    setTimeout(() => {
        notification.fadeOut(300, function () {
            $(this).remove();
        });
    }, 3000);
}

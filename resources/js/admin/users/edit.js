import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $(document).on("click", ".edit-user-btn", function () {
        const userId = $(this).data("user-id");
        const userName = $(this).data("user-name");
        const userEmail = $(this).data("user-email");
        const userStatus = $(this).data("user-status");

        $("#userId").val(userId);
        $("#name").val(userName);
        $("#email").val(userEmail);
        $("#status").val(userStatus);

        $("#editUserModal").removeClass("hidden");
    });

    // Close modal
    $(".close-modal").click(function () {
        $("#editUserModal").addClass("hidden");
        $("#errorMessage").addClass("hidden").text("");
    });

    // Handle form submission
    $("#editUserForm").submit(function (e) {
        e.preventDefault();
        const userId = $("#userId").val();

        $.ajax({
            url: `/admin/users/${userId}`,
            method: "PUT",
            data: {
                _token: $('input[name="_token"]').val(),
                name: $("#name").val(),
                email: $("#email").val(),
                status: $("#status").val(),
            },
            success: function (response) {
                // Close modal
                $("#editUserModal").addClass("hidden");
                console.log(response);
                const avatar = `https://ui-avatars.com/api/?name=${response.user.name}&background=random`;
                $("#userImage_" + userId).attr("src", avatar);
                $("#userName_" + userId).text(response.user.name);
                $("#userEmail_" + userId).text(response.user.email);
                $("#userStatus_" + userId).text(response.status);
                $("#userStatus_" + userId).removeClass(
                    "bg-green-100 text-green-800 bg-red-100 text-red-800"
                );
                if (response.status === "active") {
                    $("#userStatus_" + userId).addClass(
                        "bg-green-100 text-green-800"
                    );
                } else {
                    $("#userStatus_" + userId).addClass(
                        "bg-red-100 text-red-800"
                    );
                }
                // Show success message (you can implement this)
                showNotification("User updated successfully", "success");
            },
            error: function (xhr) {
                // Show error message
                const errorMessage =
                    xhr.responseJSON?.message ||
                    "An error occurred while updating the user";
                $("#errorMessage").removeClass("hidden").text(errorMessage);
            },
        });
    });

    // Optional: Close modal when clicking outside
    $(window).click(function (e) {
        if ($(e.target).is("#editUserModal")) {
            $("#editUserModal").addClass("hidden");
            $("#errorMessage").addClass("hidden").text("");
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

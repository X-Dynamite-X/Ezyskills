import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
});

$(document).ready(function () {
    // Delete Plan buttons
    $(document).on("click", ".delete-plan-btn", function () {
        const planId = $(this).data("plan-id");

        // Set form action and plan ID
        $("#deletePlanForm").attr("action", `/admin/pricing/${planId}`);
        $("#planIdToDelete").val(planId);
        $("#deletePlanModal").removeClass("hidden");
    });
    $(".close-modal").on("click", function () {
        $(".modal").addClass("hidden");
    });
    $("#deletePlanForm").on("submit", function (e) {
        e.preventDefault();
        const planId = $("#planIdToDelete").val();
        $.ajax({
            url: `/admin/pricingPlan/${planId}`,
            method: "DELETE",
            success: function (response) {
                $("#deletePlanModal").addClass("hidden");
                $("#plan_" + planId).remove();
                showNotification("Plan deleted successfully", "success");
            },
            error: function (xhr) {
                const errorMessage =
                    xhr.responseJSON?.message ||
                    "An error occurred while deleting the plan";
                showNotification(errorMessage, "error");
            },
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
});

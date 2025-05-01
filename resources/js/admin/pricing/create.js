import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $("#addPlanBtn").on("click", function () {
        $("#createPlanModal").removeClass("hidden");
    });
    $("#createPlanForm").on("submit", function (e) {
        e.preventDefault();

        // إزالة أي أخطاء سابقة
        $(".error-message").text("");

        const planName = $("#name").val();
        const planPrice = $("#price").val();
        const planCredit = $("#credit").val();
        const planDescription = $("#description").val();
        const planFeatures = $("#features").val();

        $.ajax({
            url: $("#createPlanForm").attr("action"),
            method: "POST",
            data: {
                name: planName,
                price: planPrice,
                credit: planCredit,
                description: planDescription,
                features: planFeatures,
            },
            dataType: "json",
            success: function (response) {
                $("#createPlanModal").addClass("hidden");
                $("#pricingPlansSection").append(response.pricingPlan);
                showNotification("Plan created successfully", "success");
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    // عرض الأخطاء أسفل كل حقل
                    for (const field in errors) {
                        $(`#error-${field}`).text(errors[field][0]);
                    }
                } else {
                    showNotification(
                        "An error occurred while creating the plan",
                        "error"
                    );
                }
            },
        });
    });

    $(".close-modal").on("click", function () {
        const form = $(this).closest(".modal").find("form");
        if (form.length) {
            form[0].reset();
            form.find(".border-red-500").removeClass("border-red-500");
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

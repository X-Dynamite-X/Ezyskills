import $ from "jquery";

$(document).ready(function () {

    $(".pricing-btn").on("click", function () {
        const pricingId = $(this).data("pricing");
        $("#pricingId").val(pricingId);
        $("#bayConfirmModal").removeClass("hidden");
    });
    $(".close-confirm-modal").on("click", function () {
        $("#bayConfirmModal").addClass("hidden");
    });
    $("#confirmBay").on("click", function () {
        const pricingId = $("#pricingId").val();
        $.ajax({
            url: `/pricing/${pricingId}`,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $("#bayConfirmModal").addClass("hidden");
                window.location.href = response.redirect; // تحويل إلى الصفحة الرئيسية
                showNotification("You have successfully enrolled in the course", "success");
            },
            error: function (xhr) {
                console.error("Error confirming bay:", xhr);
            },
        });
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

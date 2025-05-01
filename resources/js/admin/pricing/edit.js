import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    // Event handler for edit plan buttons
    $(document).on("click", ".edit-plan-btn", function () {
        const $this = $(this);
        const planName = $this.data("plan-name");
        const planPrice = $this.data("plan-price");
        const planCredit = $this.data("plan-credits");
        const planDescription = $this.data("plan-description");
        const planFeatures = $this.data("plan-features");
        const planId = $this.data("plan-id");

        $("#edit_name").val(planName);
        $("#edit_price").val(planPrice);
        $("#edit_credit").val(planCredit);
        $("#edit_description").val(planDescription);
        $("#edit_features").val(planFeatures);
        $("#editPlanForm").attr("action", `/admin/pricingPlan/${planId}`);
        $("#editPlanModal").removeClass("hidden");
    });
});
function updatePlanDataAttributes(planId, updatedPlan) {
    // احصل على زر التعديل بناءً على الـ ID
    const editButton = $(`#editPlanBtn_${planId}`);

    // تأكد من أن الزر موجود
    if (editButton.length === 0) return;

    // تحديث البيانات داخل خصائص data
    editButton.data("plan-id", planId);
    editButton.data("plan-name", updatedPlan.name ?? "");
    editButton.data("plan-price", updatedPlan.price ?? "");
    editButton.data("plan-credits", updatedPlan.credit ?? "");
    editButton.data("plan-features", updatedPlan.features ?? "");
    editButton.data("plan-description", updatedPlan.description ?? "");
 
    editButton.attr("data-plan-id", planId);
    editButton.attr("data-plan-name", updatedPlan.name ?? "");
    editButton.attr("data-plan-price", updatedPlan.price ?? "");
    editButton.attr("data-plan-credits", updatedPlan.credit ?? "");
    editButton.attr("data-plan-features", updatedPlan.features ?? "");
    editButton.attr("data-plan-description", updatedPlan.description ?? "");
}

// Handle form submission
$("#editPlanForm").on("submit", function (e) {
    e.preventDefault();
    const planName = $("#edit_name").val();
    const planPrice = $("#edit_price").val();
    const planCredit = $("#edit_credit").val();
    const planDescription = $("#edit_description").val();
    const planFeatures = $("#edit_features").val();

    $.ajax({
        url: $("#editPlanForm").attr("action"),
        method: "PUT",
        data: [
            { name: "name", value: planName },
            { name: "price", value: planPrice },
            { name: "credit", value: planCredit },
            { name: "description", value: planDescription },
            { name: "features", value: planFeatures },
        ],
        dataType: "json",
        success: function (response) {
            $("#editPlanModal").addClass("hidden");
            const planElement = $(`#plan_${response.pricingPlan.id}`);

            // Update text content
            planElement.find(".plan-name").text(response.pricingPlan.name);
            planElement
                .find(".plan-price")
                .text("$" + response.pricingPlan.price);
            planElement.find(".plan-credit").text(response.pricingPlan.credit);
            planElement
                .find(".plan-description")
                .text(response.pricingPlan.description);

            // Update features with proper formatting
            const featuresContainer = planElement.find(".plan-features");
            featuresContainer.empty();
            const features = response.pricingPlan.features.split(",");
            features.forEach((feature) => {
                const featureItem = $(`
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600">${feature.trim()}</span>
                    </div>
                `);
                featuresContainer.append(featureItem);
            });
            featuresContainer.append(`
                <div class="flex items-center mt-2">
                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-600">${response.pricingPlan.credit} Credits</span>
                </div>
            `);

            // Update data attributes on the edit button

            updatePlanDataAttributes(
                response.pricingPlan.id,
                response.pricingPlan
            );
            // Show success notification
            showNotification(
                response.message || "Plan updated successfully",
                "success"
            );
        },
        error: function (xhr) {
            console.error("Error updating plan:", xhr);

            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON.errors;
                let errorMessage = "Please correct the following errors:<br>";

                $.each(errors, function (field, messages) {
                    errorMessage += `- ${messages[0]}<br>`;
                    $(`#edit_${field}`).addClass("border-red-500");
                });

                showNotification(errorMessage, "error");
            } else {
                showNotification(
                    "An error occurred while updating the plan. Please try again.",
                    "error"
                );
            }
        },
    });
});

// Close modal event
$(".close-modal").on("click", function () {
    $("#editPlanModal").addClass("hidden");
    // Reset form and remove error styling
    $("#editPlanForm")[0].reset();
    $("#editPlanForm .border-red-500").removeClass("border-red-500");
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

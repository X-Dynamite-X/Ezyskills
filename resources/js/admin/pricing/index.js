import $ from "jquery";

import "./edit";
import "./delete";
import "./create";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    // Search functionality with debounce
    let searchTimeout;
    $("#searchInput").on("input", function () {
        clearTimeout(searchTimeout);
        const $this = $(this);

        searchTimeout = setTimeout(function () {
            const searchTerm = $this.val().toLowerCase();

            $(".pricing-plan").each(function () {
                const planName = $(this)
                    .find(".plan-name")
                    .text()
                    .toLowerCase();
                const planDescription = $(this)
                    .find(".plan-description")
                    .text()
                    .toLowerCase();

                if (
                    planName.includes(searchTerm) ||
                    planDescription.includes(searchTerm)
                ) {
                    $(this).removeClass("hidden");
                } else {
                    $(this).addClass("hidden");
                }
            });
        }, 300);
    });
});

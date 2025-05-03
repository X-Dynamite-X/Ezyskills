import $ from "jquery"
import "./apiIndexPage";
import "./model/create";
$(document).ready(function () {
    // Toggle course content
    $(".course-header").click(function () {
        $(this).next(".course-content").toggleClass("hidden");
        $(this).find(".chevron-down").toggleClass("rotate-chevron");
    });

    // Prevent propagation for course items
    $(".course-items").click(function (e) {
        e.stopPropagation();
    });

    // Pagination dots
    $(".pagination-dot").click(function () {
        $(".pagination-dot").removeClass("active");
        $(this).addClass("active");
    });


});


import $ from "jquery"

$(document).ready(function () {
    $(".course-header").click(function () {
        $(this).next(".course-content").toggleClass("hidden");
        $(this).find(".chevron-down").toggleClass("rotate-chevron");
    });
    $(".course-items").click(function (e) {
        e.stopPropagation();
    });
    

    $(".pagination-dot").click(function () {
        $(".pagination-dot").removeClass("active");
        $(this).addClass("active");
    });
});

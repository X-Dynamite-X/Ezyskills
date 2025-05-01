import $ from "jquery"

$(document).ready(function () {
    $(document).on("click", ".info-student-btn", function () {
        const courseId = $(this).data("studant-info");
        console.log(courseId);
    });
})

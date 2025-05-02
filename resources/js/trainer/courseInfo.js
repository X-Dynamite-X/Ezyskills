import $ from "jquery";

$(document).ready(function () {

    $('.info-course-btn').on('click', function () {

        const courses = $(this).data("course");

        console.log(courses);
    })
})



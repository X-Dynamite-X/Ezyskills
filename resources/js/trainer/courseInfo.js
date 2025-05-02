import $ from "jquery";

$(document).ready(function () {
    // Click handler for course info button
    $('.info-course-btn').on('click', function () {
        // Get course and course info data from data attributes
        const course = $(this).data("course");
        const courseInfo = $(this).data("course-info");

        console.log("Course data:", course);
        console.log("Course info data:", courseInfo);

        // Populate the modal with course data
        populateCourseInfoModal(course, courseInfo);

        // Show the modal
        $("#courseInfoModal").removeClass("hidden");
    });

    // Close modal when close buttons are clicked
    $(".close-info-modal").on("click", function() {
        $("#courseInfoModal").addClass("hidden");
    });

    // Function to populate the modal with course data
    function populateCourseInfoModal(course, courseInfo) {
        // Basic course info
        $("#course-info-title-text").text(course.title || "");
        $("#course-info-description").text(course.description || "");
        $("#course-info-price").text("$" + (parseFloat(course.pricing) || 0).toFixed(2));
        $("#course-info-created").text(formatDate(course.created_at) || "");
        $("#course-info-updated").text("Last updated: " + (formatDate(course.updated_at) || ""));

        // Set course image
        if (course.image) {
            $("#course-info-image").attr("src", "/storage/" + course.image);
        } else {
            $("#course-info-image").attr("src", "/img/course/image 29.png");
        }

        // Set course status with appropriate color
        const statusElement = $("#course-info-status");
        statusElement.text(course.status || "");

        // Set status color based on status value
        if (course.status === "published") {
            statusElement.removeClass().addClass("px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800");
        } else if (course.status === "draft") {
            statusElement.removeClass().addClass("px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800");
        } else {
            statusElement.removeClass().addClass("px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800");
        }

        // Course about section
        $("#course-info-about").text(courseInfo.about || "No detailed description available.");

        // Course objectives
        const objectivesContainer = $("#course-info-objectives");
        objectivesContainer.empty();

        if (courseInfo.objectives && Array.isArray(courseInfo.objectives) && courseInfo.objectives.length > 0) {
            courseInfo.objectives.forEach(objective => {
                objectivesContainer.append(`
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-[#FF914C] mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>${objective}</span>
                    </div>
                `);
            });
        } else if (courseInfo.objectives && typeof courseInfo.objectives === 'string') {
            objectivesContainer.append(`
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-[#FF914C] mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>${courseInfo.objectives}</span>
                </div>
            `);
        } else {
            objectivesContainer.append("<p>No objectives available.</p>");
        }

        // Course content
        const contentContainer = $("#course-info-content");
        contentContainer.empty();

        if (courseInfo.content && typeof courseInfo.content === 'object' && Object.keys(courseInfo.content).length > 0) {
            Object.entries(courseInfo.content).forEach(([sectionName, lessons]) => {
                const sectionHtml = $(`
                    <div class="mb-4">
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg mb-2">
                            <h4 class="font-semibold">${sectionName}</h4>
                            <span class="text-sm text-gray-500">${Array.isArray(lessons) ? lessons.length : 1} lessons</span>
                        </div>
                        <ul class="pl-4 space-y-2"></ul>
                    </div>
                `);

                const lessonsList = sectionHtml.find("ul");

                if (Array.isArray(lessons) && lessons.length > 0) {
                    lessons.forEach(lesson => {
                        lessonsList.append(`
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#FF914C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span>${lesson}</span>
                            </li>
                        `);
                    });
                } else if (typeof lessons === 'string') {
                    lessonsList.append(`
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-[#FF914C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span>${lessons}</span>
                        </li>
                    `);
                }

                contentContainer.append(sectionHtml);
            });
        } else {
            contentContainer.append("<p>No content sections available.</p>");
        }

        // Projects
        const projectsContainer = $("#course-info-projects");
        projectsContainer.empty();

        if (courseInfo.projects && typeof courseInfo.projects === 'object' && Object.keys(courseInfo.projects).length > 0) {
            Object.entries(courseInfo.projects).forEach(([projectTitle, details]) => {
                const projectHtml = $(`
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 p-3 border-b">
                            <h4 class="font-semibold">${projectTitle}</h4>
                        </div>
                        <div class="p-3">
                            <ul class="list-disc pl-5 space-y-1 text-sm text-gray-600"></ul>
                        </div>
                    </div>
                `);

                const detailsList = projectHtml.find("ul");

                if (Array.isArray(details) && details.length > 0) {
                    details.forEach(detail => {
                        detailsList.append(`<li>${detail}</li>`);
                    });
                } else if (typeof details === 'string') {
                    detailsList.append(`<li>${details}</li>`);
                }

                projectsContainer.append(projectHtml);
            });
        } else {
            projectsContainer.append("<p>No projects available.</p>");
        }
    }

    // Helper function to format date
    function formatDate(dateString) {
        if (!dateString) return "";

        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }
});


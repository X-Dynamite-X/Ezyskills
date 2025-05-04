import $ from "jquery";
import { initStepNavigation } from "./components/stepNavigation.js";
import { initImagePreview } from "./components/imagePreview.js";
import { initObjectives } from "./components/objectives.js";
import { initContentSections } from "./components/contentSections.js";
import { initProjects } from "./components/projects.js";
import { initReviewSection } from "./components/reviewSection.js";
import { initFormValidation } from "./components/formValidation.js";

$(document).ready(function () {
    console.log("Course creation page initialized");

    // Initialize all components
    const { showStep } = initStepNavigation();
    initImagePreview();
    initObjectives();
    initContentSections();
    initProjects();
    const { updateReviewSection } = initReviewSection();
    initFormValidation();

    // Make updateReviewSection globally available for other components
    window.updateReviewSection = updateReviewSection;

    // Show initial step
    showStep("step1");

    // Force update review section after a short delay to ensure all elements are loaded
    setTimeout(function () {

        updateReviewSection();
    }, 1000);



    $("#course-form-edit").on("submit", function (e) {
        e.preventDefault();


        // Collect basic course data
        const formData = new FormData(this);

        // Collect objectives
        const objectives = [];
        $(".objective-item input").each(function () {
            const value = $(this).val().trim();
            if (value) {
                objectives.push(value);
            }
        });

        // Collect content data
        const content = {};
        const contentSections = $(".content-section");

        contentSections.each(function (sectionIndex) {
            const sectionName = $(this)
                .find('input[name="content_sections[]"]')
                .val()
                .trim();
            if (sectionName) {
                const lessons = [];
                $(this)
                    .find(`input[name="lessons[${sectionIndex}][]"]`)
                    .each(function () {
                        if ($(this).val().trim()) {
                            lessons.push($(this).val().trim());
                        }
                    });
                content[sectionName] = lessons;
            }
        });

        // Collect project data
        const projects = {};
        const projectItems = $(".project-item");

        projectItems.each(function (projectIndex) {
            const projectTitle = $(this)
                .find('input[name="project_titles[]"]')
                .val()
                .trim();
            if (projectTitle) {
                const details = [];
                $(this)
                    .find(`input[name="project_details[${projectIndex}][]"]`)
                    .each(function () {
                        if ($(this).val().trim()) {
                            details.push($(this).val().trim());
                        }
                    });
                projects[projectTitle] = details;
            }
        });

        // Add content and projects as JSON
        formData.append("objectives_json", JSON.stringify(objectives));
        formData.append("content_json", JSON.stringify(content));
        formData.append("projects_json", JSON.stringify(projects));




        // Show loading state
        $("#create-course")
            .prop("disabled", true)
            .html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...'
            );

        // Send data using AJAX
        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log("Form submission successful");
                console.log(response.redirect);
                console.log(response);

                // Show success message

                window.location.href = `/courses/${response.course.id}`;
            },
            error: function (xhr) {
                console.error("Form submission failed");
                console.error(xhr);

                // Reset button state
                $("#create-course")
                    .prop("disabled", false)
                    .html("Create Course");

                // Show error message
                let errorMessage =
                    "An error occurred while creating the course.";
                let errorDetails = "";

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage += " Please check the entered data.";

                    // Collect detailed errors
                    const errors = xhr.responseJSON.errors;
                    for (const field in errors) {
                        errorDetails += `<li>${errors[field]}</li>`;
                    }
                }

                Swal.fire({
                    title: "Error!",
                    html: `${errorMessage}${
                        errorDetails
                            ? '<ul class="text-left mt-3">' +
                              errorDetails +
                              "</ul>"
                            : ""
                    }`,
                    icon: "error",
                    confirmButtonText: "Try Again",
                });
            },
        });
    });
});

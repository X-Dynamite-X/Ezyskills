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
    showStep('step1');

    // Force update review section after a short delay to ensure all elements are loaded
    setTimeout(function() {
        console.log("Forcing review section update");
        updateReviewSection();
    }, 1000);

    // Debug: Check if review section elements exist
    console.log("Review title element exists:", $('#review-title').length > 0);
    console.log("Review description element exists:", $('#review-description').length > 0);
    console.log("Review objectives element exists:", $('#review-objectives').length > 0);
});



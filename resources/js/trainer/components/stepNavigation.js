// Step navigation functionality
import $ from "jquery";

export function initStepNavigation() {
    const steps = ['step1', 'step2', 'step3', 'step4'];
    const stepTabs = ['step1-tab', 'step2-tab', 'step3-tab', 'step4-tab'];

    function showStep(stepId) {
        // Hide all steps
        $.each(steps, function(index, step) {
            $(`#${step}`).removeClass('active');
            $(`#${step}-tab`).removeClass('step-active step-completed').addClass('text-gray-500');
        });

        // Show the selected step
        $(`#${stepId}`).addClass('active');
        $(`#${stepId}-tab`).addClass('step-active').removeClass('text-gray-500');

        // Mark previous steps as completed
        const currentIndex = steps.indexOf(stepId);
        for (let i = 0; i < currentIndex; i++) {
            $(`#${steps[i]}-tab`).addClass('step-completed').removeClass('step-active text-gray-500');
        }
    }

    // Step tab clicks
    $.each(stepTabs, function(index, tabId) {
        $(`#${tabId}`).on('click', function() {
            showStep(steps[index]);
        });
    });

    // Next/Previous buttons
    $('#step1-next').on('click', function() {
        showStep('step2');
    });

    $('#step2-prev').on('click', function() {
        showStep('step1');
    });

    $('#step2-next').on('click', function() {
        showStep('step3');
    });

    $('#step3-prev').on('click', function() {
        showStep('step2');
    });

    $('#step3-next').on('click', function() {
        updateReviewSection();
        showStep('step4');
    });

    $('#step4-prev').on('click', function() {
        showStep('step3');
    });

    return { showStep };
}

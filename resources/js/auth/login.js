import $ from "jquery";

$(document).ready(function () {

    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        // Remove any existing error messages
        $('.validation-error').remove();
        $('.border-red-500').removeClass('border-red-500');

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                window.location.href = response.redirect;
            },
            error: function (response) {
                if (response.status === 422) {
                    const errors = response.responseJSON.errors;

                    // Display validation errors
                    Object.keys(errors).forEach(function (field) {
                        const input = $(`#${field}`);
                        input.addClass('border-red-500');
                        input.parent().append(
                            `<p class="validation-error mt-1 text-xs text-red-500">${errors[field][0]}</p>`
                        );
                    });
                } else {
                    console.error('An error occurred:', response);
                }
            }
        });
    });
});


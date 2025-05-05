import $ from "jquery";

$(document).ready(function () {
    function highlightStars(rating) {
        $(".star-label").each(function () {
            if ($(this).data("rating") <= rating) {
                $(this)
                    .removeClass("text-gray-300")
                    .addClass("text-yellow-400");
            } else {
                $(this)
                    .removeClass("text-yellow-400")
                    .addClass("text-gray-300");
            }
        });
    }

    // عند تحميل الصفحة، إذا كان هناك تقييم مسبق، يتم تفعيله
    const selectedRating = $('input[name="rating"]:checked').val();
    if (selectedRating) {
        highlightStars(selectedRating);
        $("#ratingValue").text(selectedRating);
        $("#selectedRating").removeClass("hidden");
    }

    // عند تحريك الماوس فوق النجوم
    $(".star-label").hover(
        function () {
            const rating = $(this).data("rating");
            highlightStars(rating);
        },
        function () {
            const selectedRating = $('input[name="rating"]:checked').val();
            if (selectedRating) {
                highlightStars(selectedRating);
            } else {
                $(".star-label")
                    .removeClass("text-yellow-400")
                    .addClass("text-gray-300");
                $("#selectedRating").addClass("hidden");
            }
        }
    );

    // عند النقر على النجمة
    $(".star-label").click(function () {
        const rating = $(this).data("rating");
        const currentRating = $('input[name="rating"]:checked').val();

        if (currentRating == rating) {
            // إذا تم النقر على نفس التقييم، يتم إلغاء التحديد
            $('input[name="rating"]').prop("checked", false);
            $(".star-label")
                .removeClass("text-yellow-400")
                .addClass("text-gray-300");
            $("#selectedRating").addClass("hidden");
        } else {
            // تحديد التقييم الجديد
            $(`#simpleStar${rating}`).prop("checked", true);
            highlightStars(rating);
            $("#ratingValue").text(rating);
            $("#selectedRating").removeClass("hidden");
        }
    });

    $("#simpleEvaluationForm").submit(function (e) {
        e.preventDefault();

        const selectedRating = $('input[name="rating"]:checked').val();
        if (!selectedRating) {
            alert("Please select a rating before submitting.");
            return;
        }

        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                alert("Rating submitted successfully!");
            },
            error: function (xhr) {
                alert("Error submitting rating. Please try again.");
            },
        });
    });
});

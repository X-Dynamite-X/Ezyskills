import $ from "jquery";

$(document).ready(function () {
    // مصفوفة الصور
    const images = [
        "http://127.0.0.1:8000/img/home/features/1.png",
        "http://127.0.0.1:8000/img/home/features/2.png",
        "http://127.0.0.1:8000/img/home/features/3.png",
        "http://127.0.0.1:8000/img/home/features/4.png",

    ];

    let currentIndex = 0;

    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length; // تنقل دائري
        $("#feature-image").fadeOut(300, function () {
            $(this).attr("src", images[currentIndex]).fadeIn(1000);
        });

        // تغيير لون الشريط
        $("#indicator span")
            .removeClass("bg-[#FF914C]")
            .addClass("bg-gray-300");
        $("#indicator span")
            .eq(currentIndex)
            .removeClass("bg-gray-300")
            .addClass("bg-[#FF914C]");
    }

    setInterval(changeImage, 3000);
});

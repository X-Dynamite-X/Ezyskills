import $ from "jquery";
import { initReviewSection } from "./components/reviewSection.js";
import "./delete";
import "./studant";
import "./courseInfo";
import "./create";

// تنفيذ الكود عند تحميل الصفحة
$(document).ready(function () {
    console.log("Trainer index.js loaded");

    // تهيئة قسم المعاينة إذا كنا في صفحة إنشاء الدورة
    if (window.location.pathname.includes("/trainer/courses/create")) {
        console.log("Initializing review section");
        const { updateReviewSection } = initReviewSection();

        // جعل وظيفة تحديث المعاينة متاحة عالم<|im_start|>
        window.updateReviewSection = updateReviewSection;

        // تحديث المعاينة عند تغيير أي حقل
        $(document).on("input change", "input, textarea, select", function () {
            console.log("Input changed, updating review");
            updateReviewSection();
        });

        // تحديث المعاينة عند النقر على زر "التالي: المعاينة والإرسال"
        $("#step3-next").on("click", function () {
            console.log("Step 4 button clicked, updating review");
            setTimeout(updateReviewSection, 100);
        });

        // تحديث أولي بعد تأخير قصير
        setTimeout(function () {
            console.log("Initial review update");
            updateReviewSection();
        }, 500);

        $("#course-form").on("submit", function (e) {
            e.preventDefault();

            const form = $(this)[0];
            const formData = new FormData(form);

            $.ajax({
                url: "/your-route-here", // غيّر هذا إلى المسار الصحيح في Laravel
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val(), // استخدم التوكن من input
                },
                beforeSend: function () {
                    // يمكنك عرض مؤشّر تحميل هنا
                    console.log("جارٍ الإرسال...");
                },
                success: function (response) {
                    // عند النجاح
                    alert("تم حفظ الدورة بنجاح!");
                    console.log(response);
                    // يمكنك إعادة توجيه المستخدم أو تصفير النموذج
                },
                error: function (xhr) {
                    // عند وجود خطأ
                    console.error(xhr.responseText);
                    alert("حدث خطأ أثناء الإرسال. الرجاء التحقق من البيانات.");
                },
            });
        });

        $(document).on("click", ".pagination-wrapper a", function (e) {
            e.preventDefault();
            const url = $(this).attr("href");
            $.ajax({
                url: url,
                method: "GET",
                success: function (response) {
                    window.history.pushState({}, "", url);
                    $("#courses-table").html(response.courses);
                    $(".pagination-wrapper").html(response.pagination);
                },
            });
        });
        let searchTimeout;

        $("#searchInput").on("input", function () {
            clearTimeout(searchTimeout);
            const searchTerm = $(this).val();
            searchTimeout = setTimeout(() => {
                const url = `/trainer/?search=${encodeURIComponent(
                    searchTerm
                )}`;
                $.ajax({
                    url: url,
                    method: "GET",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    success: function (response) {
                        console.log(response);
                        window.history.pushState({}, "", url);
                        $("#courses-table").html(response.courses);
                        $(".pagination-wrapper").html(response.pagination);
                    },
                });
            }, 300);
        });
        $(".status-filter").click(function () {
            $(".status-filter")
                .removeClass("text-[#FF914C] border-b-2 border-[#FF914C] ")
                .addClass(
                    " text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] "
                );
            $(this)
                .addClass("text-[#FF914C] border-b-2 border-[#FF914C] ")
                .removeClass(
                    "text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C]"
                );
            const status = $(this).data("status");
            const searchTerm = $("#searchInput").val();
            const url = `/trainer/?${status ? "status=" + status : ""}${
                searchTerm ? "&search=" + encodeURIComponent(searchTerm) : ""
            }`;
            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
                success: function (response) {
                    console.log(response);
                    window.history.pushState({}, "", url);

                    $("#courses-table").html(response.courses);
                    $(".pagination-wrapper").html(response.pagination);
                },
            });
        });
        $(".status-filter").click(function () {
            $(".status-filter").removeClass("active-filter");
            $(this).addClass("active-filter");
        });
    }
});

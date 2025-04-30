import $ from "jquery";

$(document).ready(function () {
    // Function to update courses content
    function updateCoursesContent(url) {
        $.ajax({
            url: url,
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            success: function (response) {
                // Update URL without page refresh
                window.history.pushState({}, "", url);
                // Update content
                $(".corsesSection").html(response.courses);
                $(".pagination-wrapper").html(response.pagination);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching courses:", error);
            },
        });
    }

    // Reset filters form handler with preventDefault
    $(document).on("click", "#resetFiltersBtn", function (e) {
        e.preventDefault();

        // تفريغ حقل البحث
        $("#searchCourses").val("");
    e.preventDefault();
    $(".status-filter").removeClass(
        "text-[#FF914C] border-b-2 border-[#FF914C]"
    );
    $(".status-filter").addClass("text-gray-500 border-b-transparent");

    // تفعيل التصميم على الزر الحالي
    $(".status-filter[data-status='']")
        .removeClass("text-gray-500 border-b-transparent")
        .addClass("text-[#FF914C] border-b-2 border-[#FF914C]");

         $(".status-filter").removeClass("active-filter");
        $(".status-filter[data-status='']").addClass("active-filter");

        // إعادة تعيين القوائم المنسدلة إذا وجدت
        $("#categorySelect, #levelSelect").val("");

        // تحديث المحتوى بدون تحديث الصفحة
        $.ajax({
            url: "/courses",
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            success: function (response) {
                $(".corsesSection").html(response.courses);

                if (response.pagination) {
                    $(".pagination-wrapper").html(response.pagination);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error resetting filters:", error);
            },
        });
    });

    // Pagination click handler with preventDefault
    $(document).on("click", ".pagination-wrapper a", function (e) {
        e.preventDefault();
        const url = $(this).attr("href");
        updateCoursesContent(url);
    });

    // Search input handler with debounce
    let searchTimeout;
    $("#searchCourses").on("input", function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const url = buildFilterUrl();
            updateCoursesContent(url);
        }, 300);
    });

    // Status filter handler
    $(".status-filter").on("click", function (e) {
        e.preventDefault();
        $(".status-filter").removeClass(
            "text-[#FF914C] border-b-2 border-[#FF914C]"
        );
        $(".status-filter").addClass("text-gray-500 border-b-transparent");

        // تفعيل التصميم على الزر الحالي
        $(this)
            .removeClass("text-gray-500 border-b-transparent")
            .addClass("text-[#FF914C] border-b-2 border-[#FF914C]");
        $(".status-filter").removeClass("active-filter");
        $(this).addClass("active-filter");

        const url = buildFilterUrl();
        updateCoursesContent(url);
    });

    // Category and Level select handlers
    $("#categorySelect, #levelSelect").on("change", function () {
        const url = buildFilterUrl();
        updateCoursesContent(url);
    });

    // Helper function to build filter URL
    function buildFilterUrl() {
        const searchTerm = $("#searchCourses").val();
        const status = $(".status-filter.active-filter").data("status");

        let url = "/courses?";
        if (searchTerm) url += `search=${encodeURIComponent(searchTerm)}&`;
        if (status) url += `status=${encodeURIComponent(status)}&`;

        return url.slice(0, -1); // Remove trailing &
    }
});

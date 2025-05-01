import $ from "jquery";

 
import "./delete";
import "./studant";

$(document).ready(function () {
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
            const url = `/trainer/?search=${encodeURIComponent(searchTerm)}`;
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
        $(this).addClass("text-[#FF914C] border-b-2 border-[#FF914C] ").removeClass("text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C]");
        const status = $(this).data("status");
        const searchTerm = $("#searchInput").val();
        const url = `/trainer/?${status ? 'status=' + status : ''}${searchTerm ? '&search=' + encodeURIComponent(searchTerm) : ''}`;
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

});

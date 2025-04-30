import $ from "jquery";

import "./users/edit";
import "./users/delete";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});


$(document).ready(function () {
    $(document).on("click", ".pagination-wrapper a", function (e) {
        e.preventDefault();
        const url = $(this).attr("href");
        $.ajax({
            url: url,
            method: "GET",
            success: function (response) {
                   console.log(response);

                window.history.pushState({}, "", url);
                $("#users-table").html(response.users);
                $(".pagination-wrapper").html(response.pagination);
            },
        });
    });

    let searchTimeout;

  $("#searchInput").on("input", function () {
      clearTimeout(searchTimeout);
      const searchTerm = $(this).val();

      searchTimeout = setTimeout(() => {
          const url = `/admin/users?search=${encodeURIComponent(searchTerm)}`;

          $.ajax({
              url: url,
              method: "GET",
              headers: {
                  "X-Requested-With": "XMLHttpRequest",
              },
              success: function (response) {
                   console.log(response);
                  $("#users-table").html(response.users);
                  $(".pagination-wrapper").html(response.pagination);
              },
          });
      }, 300);
  });

});

// Notification function

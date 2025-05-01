import $ from "jquery";

import "./edit";
import "./delete";
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

  // إضافة معالج النقر على أزرار التصفية
  $(document).on("click", "[data-sershrole]", function() {
      // إزالة الفئة النشطة من جميع الأزرار
      $("[data-sershrole]").removeClass("bg-[#003F7D] text-white").addClass("bg-gray-100 text-gray-700");

      // إضافة الفئة النشطة للزر المحدد
      $(this).removeClass("bg-gray-100 text-gray-700").addClass("bg-[#003F7D] text-white");

      const role = $(this).data("sershrole");
      const searchTerm = $("#searchInput").val();

      // بناء URL مع المعايير
      const url = `/admin/users?${role ? 'role=' + role : ''}${searchTerm ? '&search=' + encodeURIComponent(searchTerm) : ''}`;

      $.ajax({
          url: url,
          method: "GET",
          headers: {
              "X-Requested-With": "XMLHttpRequest"
          },
          success: function (response) {

              $("#users-table").html(response.users);
              $(".pagination-wrapper").html(response.pagination);

              // تحديث URL الصفحة بدون إعادة تحميل
              window.history.pushState({}, '', url);
          },
          error: function(xhr) {
              console.error("Error filtering users:", xhr);
              showNotification("Error filtering users", "error");
          }
      });
  });

});

// Notification function


import $ from 'jquery'
import './auth/register';
import "./auth/login";
import "./home/featurse"


     $(document).ready(function () {
         // مثال على تفاعل jQuery
         $("nav a").hover(function () {
             $(this).toggleClass("text-orange-500");
         });
     });
   $(document).ready(function () {
       $(".accordion-header").on("click", function () {
           const parent = $(this).closest(".accordion-item");
           const content = parent.find(".accordion-content");

           // إغلاق جميع العناصر الأخرى
           $(".accordion-item")
               .not(parent)
               .removeClass("active")
               .find(".accordion-content")
               .addClass("hidden");
           $(".accordion-item")
               .not(parent)
               .find(".plus-icon")
               .removeClass("hidden");
           $(".accordion-item")
               .not(parent)
               .find(".minus-icon")
               .addClass("hidden");

           // تبديل العنصر الحالي
           parent.toggleClass("active");
           content.toggleClass("hidden");

           // تبديل الأيقونات داخل العنصر الحالي
           parent.find(".plus-icon").toggleClass("hidden");
           parent.find(".minus-icon").toggleClass("hidden");
       });
   });

import $ from 'jquery'

// تحديد المسار الحالي
const currentPath = window.location.pathname;

// استيراد الملفات بناءً على المسار
if (currentPath === '/register' || currentPath === '/login') {
    import('./auth/register.js');
    import('./auth/login.js');
}

if (currentPath === '/courses') {
    import('./courses/index.js');
}

if (currentPath.startsWith('/admin')) {
    import('./admin/users.js');
}

if (currentPath === '/') {
    import('./home/featurse.js');
}


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



     $(document).ready(function() {
         // Hover effect for project cards
         $('.project-card').hover(
             function() {
                 $(this).find('.project-details').slideDown(200);
                 $(this).find('.arrow-icon').addClass('rotate-90');
                 $(this).addClass('bg-gray-50');
             },
             function() {
                 $(this).find('.project-details').slideUp(200);
                 $(this).find('.arrow-icon').removeClass('rotate-90');
                 $(this).removeClass('bg-gray-50');
             }
         );

         // Click effect for project cards
         $('.project-card').click(function() {
             $(this).addClass('scale-95').delay(100).queue(function(next){
                 $(this).removeClass('scale-95');
                 next();
             });
         });
     });




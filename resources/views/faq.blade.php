 @extends('layouts.app')

 @section('css')
     <style>
         header {
             background-color: #FF914C;
         }

         nav a {
             color: white;
         }

         .loginBtn {
             background-color: #FF914C;
             color: white;
             border: #fff solid 1px;
         }

         .loginBtn:hover {
             background-color: #FF913d;

         }

         .registerBtn {
             background-color: #fff;
             color: #000;

         }

         .leftpont {
             left: calc(1 / 5.5* 100%);
             top: calc(1 / 1.7* 100%);
         }

         .accordion-content {
             max-height: 0;
             overflow: hidden;
             transition: max-height 0.3s ease-out;
             
         }

         .accordion-item.active .accordion-content {
             max-height: 200px;
         }

         .accordion-item.active .plus-icon {
             display: none;
         }

         .accordion-item.active .minus-icon {
             display: inline;
         }

         .minus-icon {
             display: none;
         }
     </style>
 @endsection("css")
 @section('main')
     @include('section.faq.ferstSection')
     <section class="py-32  mt-[40rem] "></section>
 @endsection

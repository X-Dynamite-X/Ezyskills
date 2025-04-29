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

     </style>
 @endsection("css")
 @section('main')
     @include('section.contactUs.ferstSection')
     @include('section.contactUs.secandSection')
 @endsection

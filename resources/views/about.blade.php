@extends('layouts.app')
@section('css')
    <style>
        header {
            background-color: #03326D;
        }

        nav a {
            color: white;
        }

        .loginBtn {
            background-color: #03326D;
            color: white;
            border: #fff solid 1px;
        }

        .loginBtn:hover {
            background-color: #03325a;

        }

        .registerBtn {
            background-color: #fff;
            color: #000;

        }
    </style>
@endsection("css")

@section('main')
    @include('section.about.startSection')
    @include('section.about.secandSection')
    @include('section.about.forthSection')
    @include('section.about.fiveSection')
@endsection

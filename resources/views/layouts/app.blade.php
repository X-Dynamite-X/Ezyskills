<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @yield('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-gray-100">

    <!-- Header -->
    <div id="notifications">
        <div
            class="fixed top-4 right-4 z-50 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition-opacity duration-300 max-w-md">
            <button class="absolute top-2 right-2 text-white hover:bg-blue-600 rounded-full p-1  ml-2"
                onclick="this.parentElement.remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        <div class="m-1 ">
            tes tes tes test tse test test
            tes tes tes test tse test test
            tes tes tes test tse test test


        </div>
        </div>

    </div>

    @if (request()->routeIs('admin.*') || request()->routeIs('trainer.*'))
        @include('layouts.sidebar')
        <div class="p-4 sm:ml-64">
            @yield('main')
        </div>
    @else
        @include('layouts.header')
        @yield('main')
    @endif


    @include('layouts.footer')
    @yield('js')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>

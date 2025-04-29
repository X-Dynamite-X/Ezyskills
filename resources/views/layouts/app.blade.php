<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield("title")
    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @yield("css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="bg-gray-100">

  <!-- Header -->
    @include("layouts.header")

  @yield("main")


  <!-- Footer -->
  @include("layouts.footer")
</body>
</html>

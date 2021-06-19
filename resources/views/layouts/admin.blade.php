<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-Filing">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Filing</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/icon/folder.png') }}" rel="icon" type="image/png">

    {{-- Year picker --}}
    <link rel="stylesheet" href="{{ asset('css/yearpicker.css') }}">

</head>

<body id="page-top">

@include('layouts.sidebar')

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


</body>
</html>

<script src="{{ asset('js/yearpicker.js') }}" async></script>
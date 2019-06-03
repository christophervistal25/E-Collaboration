<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}">
        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>{{ config('app.name') }}  | @yield('title')</title>
        <!-- Styles -->

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}">
         <link rel="stylesheet" href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
           <style>
            .bg-login-image {
                background:url({{URL::asset('img/undraw_apartment_rent_o0ut.svg')}}) center center;
                background-size: cover;
            }
        </style>
    </head>
        <body id="page-top">
             <!-- Page Wrapper -->
  <div id="wrapper">

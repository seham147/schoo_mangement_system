<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  
  <link href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link href="{{ asset('build/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('build/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">

  <!-- JQVMap -->
  <link href="{{ asset('build/assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

  <!-- Theme style -->
  <link href="{{ asset('build/assets/css/adminlte.min.css') }}" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link href="{{ asset('build/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
  <!-- Daterange picker -->
  <link href="{{ asset('build/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
  <!-- summernote -->
  <link href="{{ asset('build/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  {{-- <link href="{{ asset('build/assets/css/custom.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('build/assets/css/adminlte_left.css') }}" rel="stylesheet">
  <link href="{{ asset('build/assets/css/app.b3cba1b7') }}" rel="stylesheet">


  <style>
    .mycon{
      margin-right: 220px !important
    }
  </style>
  @yield('css')




  @if (App::getlocale()=='en')
  <link href="{{ asset('build/assets/css/adminlte_left.css') }}" rel="stylesheet">


@else
<link href="{{ asset('build/assets/css/custom.css') }}" rel="stylesheet">



 @endif



</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
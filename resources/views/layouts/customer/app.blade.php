<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <!-- General CSS Files -->

  <link rel="stylesheet" href="{{ asset('customer/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('customer/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='' />
  @livewireStyles  
</head>
<body>
  {{ $slot }} 
  @livewireScripts
<script src='{{ asset('global/js/sweetalert.js') }}'></script> 
<script src='{{ asset('customer/js/jquery-3.7.1.min.js') }}'></script>
<script src="{{ asset('customer/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('customer/bundles/apexcharts/apexcharts.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('customer/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('customer/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('customer/js/custom.js') }}"></script>
{{-- <script src='{{ asset('customer/js/alpine.js') }}'></script> --}}
@stack('customer-dashboard-payment-service')
</body>
</html>
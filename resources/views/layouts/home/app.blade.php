<!DOCTYPE html>
<html lang="pt-pt" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#40E194">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="author" content="CLC Tecnologias Inc.">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('home/img/ico.ico') }}" type="image/x-icon">
    <meta name="keywords" content="Centro Multisserviços, centro de serviços elétricos, eletricidade">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta property="og:title" content="Centro Multisserviços - Prestação de Serviços de Instalação e Manutenção Elétrica">
    <meta property="og:description" content="Centro Multisserviços - Prestação de Serviços de Instalação e Manutenção Elétrica na Sapú II e Vila Flor">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    @livewireStyles
</head>
<body>

{{ $slot }}    
 @livewireScripts

<script src='{{ asset('global/js/sweetalert.js') }}'></script>
<script src="{{ asset('home/js/script.js') }}"></script> 

    
</body>
</html>

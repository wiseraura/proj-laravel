<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

<title>Admin | @yield('title')</title>

<!-- Vendors Style-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/custom-style.css') }}">

<!-- Style-->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert2.min.css') }}">

@yield('style')

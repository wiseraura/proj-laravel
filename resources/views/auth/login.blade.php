<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

    <title>EduAdmin - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('admin/images/auth-bg/bg-1.jpg') }})">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded30 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Đăng nhập</h2>
                        </div>
                        <div class="p-40">
                            <form action="{{ route('auth.login.action') }}" method="POST" accept-charset="utf-8">
                                {{ @csrf_field() }}

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" name="username" value="{{ old('username') ?? '' }}" class="form-control pl-15 bg-transparent {{ $errors->has('username') ? 'error' : ''}}" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control pl-15 bg-transparent {{ $errors->has('password') ? 'error' : ''}}" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="remember" id="basic_checkbox_1" >
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('admin/icons/assets/feather-icons/feather.min.js') }}"></script>

</body>

<!-- Mirrored from www.multipurposethemes.com/admin/eduadmin-template/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Nov 2020 01:43:45 GMT -->
</html>

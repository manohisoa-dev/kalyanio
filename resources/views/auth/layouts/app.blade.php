<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }} | Login</title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">{{ strtoupper(str_limit(config('app.name', 'Laravel'),2, '')) }}</h1>
        </div>
        @yield('content')
        <p class="m-t"> <small>&copy; <a href="http://agnaro.com/" target="_blank" class="text-decoration-none">Agnaro Webcompany</a> 2019 {{\Carbon\Carbon::now()->year != "2019" ? "- " . \Carbon\Carbon::now()->year : ""}}</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('admin/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('bower_resources/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/js/script.js') }}"></script>

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/aa54ddafa945fd26411584886/f5e119d4684b6ee8e91b1f35e.js");</script>

</body>

</html>

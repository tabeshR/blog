<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'وبلاگ تابش') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vazirfont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div id="app">

{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--        <div class="container-fluid">--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}" style="display: block;width: 100%;text-align: center;">--}}
{{--                {{ config('app.name', 'Laravel') }}--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}



    <main>
        <div class="container">
            <div class="p-5 bg-primary text-white rounded mb-4">
                <h1 class="text-center">وبلاگ تابش</h1>
                <p class="text-center mt-5">به وبلاگ من خوش آمدید</p>
                <div class="row">
                    <div class="col text-center">
                        <a href="?lang=fa">
                            <img src="/images/flags/iran.png" alt="" style="width: 32px;cursor: pointer">
                        </a>
                        <a href="?lang=en">
                            <img src="/images/flags/england.png" alt="" style="width: 30px;margin-right: 7px;cursor: pointer">
                        </a>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </main>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@include('sweet::alert')
@yield('script')
</body>
</html>

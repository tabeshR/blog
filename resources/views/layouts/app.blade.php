<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Blog Template · Bootstrap v5.0</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/css/Vazirmatn-font-face.css">
    <link rel="stylesheet" href="/css/blog.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/fonts.googleapis.com_css_family=Playfair&#43;Display_700,900&amp;display=swap.css"
          rel="stylesheet">
    <!-- Custom styles for this template -->

</head>
<body>

@include('includes.header')

<main class="container">
    @yield('content')
</main>

<footer class="blog-footer">
    <p>قالب وبلاگ برای <a href="https://getbootstrap.com/">Bootstrap</a> ساخته شده است بوسیله ی <a href="https://twitter.com/mdo">@mdo</a>.
    </p>
    <p>
        <a href="#">{{ __('Back to top') }}</a>
    </p>
</footer>


</body>
</html>

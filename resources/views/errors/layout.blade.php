<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('themes/front/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link rel="stylesheet" href="{{ asset('themes/front/') }}/css/all.min.css" />


</head>

{{-- @include('front.includes.header') --}}

@yield('content')

{{-- @include('front.includes.footer') --}}


<script src="{{ asset('themes/front/') }}/js/all.min.js"></script>

<script src="https://kit.fontawesome.com/cb9e169f93.js" crossorigin="anonymous"></script>
</body>

</html>

@extends('errors::layout')
@section('title', __('Not Found'))
@section('content')
<section class="main-error text-center m-5">
    <div class="container">
        <div class="error-img m-5">
            <picture>
                <source srcset="{{ asset('themes/front/images/webp/404.webp') }}" type="image/webp">
                <source srcset="{{ asset('themes/front/images/404.jpg') }}" type="image/jpg">
                <img src="{{ asset('themes/front/images/404.jpg') }}" alt="Header Logo" title="Header Logo" height="600px" width="600px">
            </picture>
        </div>
        <p> The page you were looking for could not be found</p>
        
    </div>
</section>
@endsection

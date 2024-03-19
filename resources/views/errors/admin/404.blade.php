@extends('errors.admin.layout')
@section('title', __('Not Found'))
@section('content')
    <img src="{{ asset('themes/admin/assets/media/illustrations/sketchy-1/18.png') }}" alt=""
        class="mw-100 mb-10 h-lg-450px" />
    <h1 class="fw-bold mb-10" style="color: #A3A3C7">Admin Seems there is nothing here</h1>
    <a href="{{ route('admin-dashboard') }}" class="btn btn-primary">Return Home</a>
@endsection

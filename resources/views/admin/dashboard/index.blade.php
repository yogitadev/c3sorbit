@extends('admin.layouts.layout')

@section('page_title', 'Dashboard')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Dashboard' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', ['title' => 'Dashboard', 'breadcrumb_arr' => $breadcrumb_arr])
@endsection


@section('header-menu')
    @include('admin.dashboard.includes.header_menu')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-px text-center pt-15 pb-15">
                <h2 class="fs-2x fw-bolder mb-0">Welcome {{ Auth::user()->getFullName() }},</h2>
                <p class="text-gray-400 fs-4 fw-bold py-7">Check out all of the options in the left menu to manage your content
                </p>
            </div>
            <div class="text-center pb-15 px-5">
                <img src="{{ asset('themes/admin/assets/media/illustrations/sketchy-1/2.png') }}" alt=""
                    class="mw-100 h-200px h-sm-325px" />
            </div>
        </div>
    </div>
@endsection

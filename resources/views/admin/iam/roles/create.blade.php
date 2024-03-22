@extends('admin.layouts.layout')

@section('page_title', 'Create Role')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => 'route(role-list)',
            'Create' => ''
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Create Role',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.iam.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div id="kt_app_content_container" class="app-container container-fluid">
    {!! Form::open(['class' => 'form w-100 module_form','id' => 'kt_create_form', 'autocomplete' => 'off', 'data-parsley-validate' => true,]) !!}    
        <div class="card mb-5 mb-xl-5">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Create</h3>
                </div>
                <div class="card-toolbar m-0">
                    <a href="{{ route('role-list') }}" class="btn btn-danger"><i class="fas fa-angle-left fs-4 me-2"></i> Go
                        Back</a>
                </div>
            </div>
            <div class="card-body border-top p-9">
                @include('admin.iam.roles._form')
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Create</span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('page_js')

@endpush

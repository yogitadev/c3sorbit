@extends('admin.layouts.layout')

@section('page_title', 'Edit Campus')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Campus' => route('campus-list'),
        $item->unqiue_id => '',
        'Edit' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Edit Campus',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.campaign.includes.header_menu')
@endsection

@section('content')

    @include('admin.includes.formErrors')
    @include('flash::message')

    {!! Form::model($item, ['method' => 'PUT', 'class' => 'form w-100 module_form','data-parsley-validate' => true,  'files' => true]) !!}

    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="{{ route('campus-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            @include('admin.campaign.campus._form')
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection

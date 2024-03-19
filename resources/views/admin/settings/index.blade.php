@extends('admin.layouts.layout')

@section('page_title', 'Settings')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Settings' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', ['title' => 'Settings', 'breadcrumb_arr' => $breadcrumb_arr])
@endsection

@section('header-menu')
    @include('admin.settings.includes.header_menu')
@endsection

@section('content')

    @include('admin.includes.formErrors')
    @include('flash::message')
    <div class="d-flex flex-column flex-lg-row">





        <div class="clearfix"></div>
        {!! Form::open(['class' => 'form w-100', 'id' => 'kt_account_profile_details_form', 'autocomplete' => 'off', 'data-parsley-validate' => true]) !!}
        <div class="card mb-5 mb-xl-5">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Setting Menagement</h3>
                </div>
            </div>
            <div class="card-body border-top p-9">
                @if (!is_null($setting_list) && $setting_list->count() > 0)
                    @foreach ($setting_list as $setting_item)
                        <div class="row mb-5">
                            <label
                                class="col-lg-2 col-form-label fw-bold fs-6 {{ $setting_item->setting_required == 'Yes' ? 'required' : '' }}">{{ $setting_item->setting_title }}</label>
                            <div class="col-lg-10">
                                @if ($setting_item->setting_type == 'Input')
                                    {!! Form::text($setting_item->setting_name, $setting_item->setting_value, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => $setting_item->setting_required == 'Yes' ? true : false, 'autofocus' => true]) !!}
                                @else
                                    {!! Form::textarea($setting_item->setting_name, $setting_item->setting_value, ['class' => 'form-control h-100px', 'required' => $setting_item->setting_required == 'Yes' ? true : false]) !!}
                                @endif
                                @if (!is_null($setting_item->setting_help_text) && $setting_item->setting_help_text != '')
                                    <div class="form-text">
                                        {!! $setting_item->setting_help_text !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="text-warning mb-0 fw-normal">No Setting Found</h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
        {!! Form::close() !!}



    </div>



@endsection

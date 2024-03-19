@extends('admin.layouts.layout')

@section('page_title', 'Profile')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Profile' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', ['title' => 'Profile', 'breadcrumb_arr' => $breadcrumb_arr])
@endsection

@section('header-menu')
    @include('admin.profile.includes.header_menu')
@endsection

@section('content')

    <div class="d-flex flex-column flex-lg-row">

        @include('admin.profile.sidebar')

        <div class="flex-lg-row-fluid ms-lg-5">

            @include('admin.includes.formErrors')
            @include('flash::message')

            {!! Form::open(['class' => 'form w-100', 'id' => 'kt_account_profile_details_form', 'autocomplete' => 'off', 'data-parsley-validate' => true]) !!}
            <div class="card mb-5 mb-xl-5">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <div class="row mb-5">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    {!! Form::text('first_name', $profile_item->first_name, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true, 'placeholder' => 'First Name']) !!}
                                </div>
                                <div class="col-lg-6 fv-row">
                                    {!! Form::text('last_name', $profile_item->last_name, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true, 'placeholder' => 'Last Name']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Username</label>
                        <div class="col-lg-8">

                            {!! Form::text('username', $profile_item->username, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true, 'placeholder' => 'First Name']) !!}

                        </div>
                    </div>
                    <!--div class="row mb-5">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                        <div class="col-lg-8">

                            {!! Form::email('email', $profile_item->email, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true, 'placeholder' => 'First Name']) !!}

                        </div>
                    </div-->
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            {!! Form::close() !!}


            {!! Form::open(['url' => route('admin-update-password'), 'class' => 'form w-100', 'id' => 'kt_signin_change_password', 'autocomplete' => 'off', 'data-parsley-validate' => true]) !!}
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Change Password</h3>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <div class="d-flex flex-wrap align-items-center mb-0">
                        <div class="flex-row-fluid">

                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current
                                            Password</label>
                                        {!! Form::password('currentpassword', ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'id' => 'currentpassword', 'required' => true]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New
                                            Password</label>

                                        {!! Form::password('password', ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'id' => 'newpassword', 'required' => true]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm
                                            New Password</label>
                                        {!! Form::password('confirmPassword', ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'id' => 'confirmpassword', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-text mb-0">Password must be at least 8 character and must contain special
                                characters
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary px-6">Update Password</button>
                </div>


            </div>
        </div>

        {!! Form::close() !!}

    @endsection

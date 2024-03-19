@extends('admin.auth.layouts.layout')

@section('page_title', 'Login')


@section('content')

    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        
        {!! Form::open(['class' => 'form w-100', 'id' => 'kt_sign_in_form', 'autocomplete' => 'off', 'data-parsley-validate' => true]) !!}
        
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In to {{ config('env.app_name') }}</h1>
        </div>
        @include('flash::message')
        @include('admin.includes.formErrors')
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fs-6 fw-bolder required text-dark">Username</label>
            </div>
            {!! Form::text('username', null, ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true]) !!}
        </div>

        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label required fw-bolder text-dark fs-6 mb-0">Password</label>
            </div>
            {!! Form::password('password', ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'required' => true]) !!}
        </div>
        <div class="fv-row mb-10">
            <a href="{{ route('admin-forget-password') }}">Forget Password ?</a>
        </div>
        <div class="text-center">

            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Sign In</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        {!! Form::close() !!}

    </div>

@endsection

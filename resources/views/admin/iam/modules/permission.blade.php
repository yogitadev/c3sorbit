@extends('admin.layouts.layout')

@section('page_title', 'Module Permission')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Modules' => 'route(module-list)',
            $module_item->unique_id => '',
            'Permission' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Modules',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.iam.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div id="kt_app_content_container" class="app-container container-fluid">

        {!! Form :: open (['class' => 'form w-100 module_form','id' => 'kt_create_form','autocomplete' => 'off','data-parsley-validate' => true,]) !!}

        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">Set Module Permission for ({{ $module_item->title }})</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="{{ route('module-list') }}" class="btn btn-dark"><i class="fas fa-arrow-left fs-4 me-1"></i>
                            Back to Modules</a>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                @if (!is_null($module_permissions) && $module_permissions->count() > 0)
                    <div class="row">
                        @foreach ($module_permissions as $module_permission_item)
                            <div class="col-md-12 mb-10">
                                <label class="form-label fs-6">{{ $module_permission_item->title }}</label>

                                {!! Form::select('permission_list[' . $module_permission_item->id . '][]', $role_list,$module_permission_item->selected_roles, ['multiple'=>'multiple','class' => 'form-select form-select-solid fw-bolder',
                                'data-control' => 'select2',
                                'multiple' => true,   
                                    ]) !!}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Update Permission</span>
                </button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

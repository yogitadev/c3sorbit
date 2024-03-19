@extends('admin.layouts.layout')

@section('page_title', 'Media')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Media' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Media',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.cms.includes.header_menu')
@endsection

@section('content')

    @include('admin.includes.formErrors')
    @include('flash::message')


    {!! Form::open(['files' => true, 'class' => 'module_form', 'data-parsley-validate' => true]) !!}
    <div class="card mb-5">
        <div class="card-header border-0">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Upload Media</h3>
            </div>
        </div>

        <div class="card-body ">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <label class="form-label required fs-6">Select Files</label>
                    {!! Form::file('files[]', ['class' => 'form-control', 'required' => true, 'accept' => '.png, .jpg, .jpeg, .pdf', 'multiple' => true]) !!}
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Upload Files</button>
        </div>
    </div>
    {!! Form::close() !!}


    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Media</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @include ('admin.cms.media._filter')
                </div>
            </div>
        </div>



        <div class="card-body py-4">

            @if (isset($list) && count($list) > 0)
                <table class="table align-middle table-row-dashed" id="custom-data-list">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">
                                File Name
                            </th>
                            <th class="min-w-125px">
                                File URL
                            </th>
                            <th class="min-w-125px">
                                {!! \App\Helpers\Helper::getColumnSortLink([
    'url' => route('media-list'),
    'column_title' => 'Uploaded At',
    'column_name' => 'created_at',
    'params' => $params,
]) !!}
                            </th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>


                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($list as $item)
                            <tr>
                                <td class="d-flex align-items-center">
                                    @if (isset($item) && !is_null($item))
                                        <a data-fancybox href="{{ $item->getUrl() }}">

                                            @if ($item->file_extension == 'pdf')
                                                <i class="fas fa-file-pdf me-5 display-2"></i>
                                            @else
                                                <img src="{{ $item->fitThumbUrl() }}" class="img-thumbnail me-5" />
                                            @endif


                                        </a>
                                    @endif
                                    <div>{{ $item->original_file_name }}</div>

                                </td>
                                <td>
                                    {{ url('') . '/uploads/media/' . $item->file_name }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>

                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                            class="fas fa-angle-down ms-1"></i>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" data-fancybox href="{{ $item->getUrl() }}"><i
                                                    class="fas fa-eye me-3"></i>View</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{ route('delete-media', ['unique_id' => $item->unique_id]) }}"
                                                data-token="{{ csrf_token() }}" class="menu-link px-3 delete-item-btn"
                                                data-kt-users-table-filter="delete_row"><i
                                                    class="fas fa-trash me-3"></i>Delete</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
                    <!--end::Svg Icon-->
                    <div class="d-flex flex-column">
                        <h4 class="text-warning mb-0 fw-normal">No Data Found</h4>
                    </div>
                </div>

            @endif


        </div>


        @if ($list->hasPages())
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    {!! $list->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        @endif


    </div>



@endsection

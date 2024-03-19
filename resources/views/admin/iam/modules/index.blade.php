@extends('admin.layouts.layout')

@section('page_title', 'Modules')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Modules' => 'route(module-list)',
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

        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">Modules</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        @include ('admin.iam.modules._filter')

                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                @if (isset($list) && count($list) > 0)
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed" id="custom-data-list">

                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">
                                        {!! \App\Helpers\Helper::getColumnSortLink([
                                            'url' => route('module-list'),
                                            'column_title' => 'Unique ID',
                                            'column_name' => 'unique_id',
                                            'params' => $params,
                                        ]) !!}
                                    </th>
                                    <th class="min-w-100px">Category</th>
                                    <th class="min-w-100px">
                                        {!! \App\Helpers\Helper::getColumnSortLink([
                                            'url' => route('module-list'),
                                            'column_title' => 'Title',
                                            'column_name' => 'title',
                                            'params' => $params,
                                        ]) !!}
                                    </th>
                                    <th class="min-w-100px"></th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($list as $item)
                                    <tr>
                                        <td>
                                            {{ $item->unique_id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->category->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->title ?? '' }}
                                        </td>
                                        <td>
                                            @if ($item->need_set_permissions == 'Yes')
                                                <span class="badge badge-danger mt-1">Need
                                                    to set permissions</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                    class="fas fa-angle-down ms-1"></i>
                                            </a>

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-200px py-4"
                                                data-kt-menu="true">
                                                @can('modules.set_permissions')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('module-permission', ['unique_id' => $item->unique_id]) }}"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-user-tag me-3"></i> Set Permission</a>
                                                    </div>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @else
                    <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                        <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
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
    </div>
@endsection
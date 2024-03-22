@extends('admin.layouts.layout')

@section('page_title', 'View Role')

@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => route('role-list'),
            $role_item->unique_id => route('view-role', ['unique_id' => $role_item->unique_id]),
            'View' => '',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'View Roles',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.iam.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div id="kt_app_content_container" class="app-container container-fluid">
        
        <div class="row">
            <div class="col-lg-3 col-md-4">
                @include('admin.iam.roles.show.includes._sidebar')
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <h3 class="fw-bolder m-0">Personnel List</h3>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                @include ('admin.iam.roles.show._filter')
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-4">
                        @if (isset($list) && count($list) > 0)
                            <table class="table align-middle table-row-dashed" id="custom-data-list">

                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">
                                            {!! \App\Helpers\Helper::getColumnSortLink([
                                                'url' => route('view-role', ['unique_id' => $role_item->unique_id]),
                                                'column_title' => 'Unique ID',
                                                'column_name' => 'unique_id',
                                                'params' => $params,
                                            ]) !!}
                                        </th>

                                        <th class="min-w-100px">
                                            {!! \App\Helpers\Helper::getColumnSortLink([
                                                'url' => route('view-role', ['unique_id' => $role_item->unique_id]),
                                                'column_title' => 'Full Name',
                                                'column_name' => 'first_name',
                                                'params' => $params,
                                            ]) !!}
                                        </th>

                                        <th class="min-w-100px">
                                            {!! \App\Helpers\Helper::getColumnSortLink([
                                                'url' => route('view-role', ['unique_id' => $role_item->unique_id]),
                                                'column_title' => 'Username',
                                                'column_name' => 'username',
                                                'params' => $params,
                                            ]) !!}
                                        </th>

                                        <th class="min-w-100px text-end">
                                            {!! \App\Helpers\Helper::getColumnSortLink([
                                                'url' => route('view-role', ['unique_id' => $role_item->unique_id]),
                                                'column_title' => 'Last Login',
                                                'column_name' => 'last_login_at',
                                                'params' => $params,
                                            ]) !!}
                                        </th>

                                        <th class="min-w-125px text-center">
                                            {!! \App\Helpers\Helper::getColumnSortLink([
                                                'url' => route('view-role', ['unique_id' => $role_item->unique_id]),
                                                'column_title' => 'Status',
                                                'column_name' => 'status',
                                                'params' => $params,
                                            ]) !!}
                                        </th>
                                        @if (\App\Helpers\Helper::hasAnyPermission('personnel'))
                                            <th class="text-end w-auto">Actions</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody class="text-gray-600 fw-bold">
                                    @foreach ($list as $item)
                                        <tr>
                                            <td>
                                                {{ $item->unique_id }}
                                            </td>
                                            <td>
                                                {{ $item->getFullName() }}
                                            </td>
                                            <td>
                                                {{ $item->username }}
                                            </td>

                                            <td class="text-end">
                                                {{ $item->last_login_at ?? '' }}
                                            </td>

                                            <td class="text-center">
                                                {!! \App\Helpers\Helper::showBadge($item->status) !!}
                                            </td>
                                            <!-- @if (\App\Helpers\Helper::hasAnyPermission('personnel')) -->
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Actions
                                                        <i class="fas fa-angle-down ms-1"></i>
                                                    </a>

                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                                        data-kt-menu="true">

                                                        <!-- @can('personnel.view') -->
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('show-personnel',['unique_id'=>$item->unique_id]) }}" class="menu-link px-3">
                                                                <i class="fas fa-eye me-3"></i> View</a>
                                                        </div>
                                                        <!-- @endcan
                                                        
                                                        @can('personnel.edit') -->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('edit-personnel', ['unique_id' => $item->unique_id]) }}"
                                                                    class="menu-link px-3">
                                                                    <i class="fas fa-pencil me-3"></i> Edit</a>
                                                            </div>
                                                        <!-- @endcan -->

                                                    </div>

                                                </td>
                                            <!-- @endif -->

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
        </div>
    </div>
@endsection

@push('page_js')
@endpush

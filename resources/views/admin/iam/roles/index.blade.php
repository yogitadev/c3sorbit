@extends('admin.layouts.layout')

@section('page_title', 'Roles')


@section('sub_header')
    @php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => 'route(role-list)',
        ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Roles',
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
                    <h3 class="fw-bolder m-0">Roles</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        @include ('admin.iam.roles._filter')

                        @can('roles.edit')
                            <a href="{{ route('reorder-role') }}" class="btn btn-warning me-3"><i
                                    class="fas fa-list fs-4 me-1"></i>
                                Reorder</a>
                        @endcan

                        @can('roles.add')
                            <a href="{{ route('create-role') }}" class="btn btn-dark"><i class="fas fa-plus fs-4 me-1"></i>
                                Create</a>
                        @endcan

                        @if (in_array(Auth::user()->email, ['milan@niupay.com.pg', 'ajay@niupay.com.pg']))
                            <a href="{{ route('role-re-assign') }}" class="btn btn-danger ms-3">
                                Role Re-Assign</a>
                        @endif
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
                                        'url' => route('role-list'),
                                        'column_title' => 'Unique ID',
                                        'column_name' => 'unique_id',
                                        'params' => $params,
                                    ]) !!}
                                </th>
                                <th class="min-w-100px">Division</th>
                                <th class="min-w-125px">
                                    {!! \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Name',
                                        'column_name' => 'name',
                                        'params' => $params,
                                    ]) !!}
                                </th>

                                <th class="min-w-125px">
                                    {!! \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Short Name',
                                        'column_name' => 'short_name',
                                        'params' => $params,
                                    ]) !!}
                                </th>

                                <th class="min-w-125px text-end">Users Count</th>

                                <th class="min-w-125px text-center">
                                    {!! \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Status',
                                        'column_name' => 'status',
                                        'params' => $params,
                                    ]) !!}
                                </th>
                                @if (\App\Helpers\Helper::hasAnyPermission('roles', ['view', 'edit', 'delete']))
                                    <th class="text-end min-w-100px">Actions</th>
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
                                        {{ $item->division->title ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->short_name }}
                                    </td>
                                    <td class="text-end">
                                        {{ $item->users_count }}
                                    </td>
                                    <td class="text-center">
                                        {!! \App\Helpers\Helper::showBadge($item->status) !!}
                                    </td>
                                    @if (\App\Helpers\Helper::hasAnyPermission('roles', ['view', 'edit', 'delete']))
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                    class="fas fa-angle-down ms-1"></i>
                                            </a>

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                                data-kt-menu="true">

                                                @can('roles.view')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('view-role', ['unique_id' => $item->unique_id]) }}"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-eye me-3"></i> View</a>
                                                    </div>
                                                @endcan

                                                @can('roles.edit')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('edit-role', ['unique_id' => $item->unique_id]) }}"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-edit me-3"></i> Edit</a>
                                                    </div>
                                                @endcan

                                                @can('roles.delete')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('delete-role', ['unique_id' => $item->unique_id]) }}"
                                                            data-token="{{ csrf_token() }}"
                                                            class="menu-link px-3 delete-item-btn"
                                                            data-kt-users-table-filter="delete_row"><i
                                                                class="fas fa-trash me-3"></i>Delete</a>
                                                    </div>
                                                @endcan
                                            </div>

                                        </td>
                                    @endif

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
@endsection

@push('page_js')
@endpush

@extends('admin.layouts.layout')

@section('page_title', 'Awarding Bodys')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Awarding Bodys' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Awarding Bodys',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.cms.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')

    <div class="card" style="width:auto;">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Awarding Bodys</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @include ('admin.cms.awarding_bodys._filter')
                    <a href="{{ route('reorder-awarding-body') }}" class="btn btn-warning me-3"><i
                            class="fas fa-list fs-4 me-1"></i>
                        Reorder</a>
                    <a href="{{ route('create-awarding-body') }}" class="btn btn-dark"><i
                            class="fas fa-plus fs-4 me-1"></i>
                        Create</a>
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            @if (isset($list) && count($list) > 0)
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed" id="custom-data-list">

                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">Unique ID</th>
                                <th class="min-w-125px">
                                    {!! \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('awarding-body-list'),
                                        'column_title' => 'Title',
                                        'column_name' => 'title',
                                        'params' => $params,
                                    ]) !!}
                                </th>
                                <th class="min-w-125px">Description</th>
                                <th class="min-w-125px">
                                    {!! \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('awarding-body-list'),
                                        'column_title' => 'Status',
                                        'column_name' => 'status',
                                        'params' => $params,
                                    ]) !!}
                                </th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>


                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($list as $item)
                                <tr>
                                    <td>
                                        {{ $item->unique_id }}
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td style="word-wrap: break-word;min-width: 600px;max-width: 600px;">
                                        {{ $item->description ?? '-'}}
                                    </td>
                                    <td>
                                        {!! \App\Helpers\Helper::showBadge($item->status) !!}
                                    </td>
                                    <td class="text-end">

                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('edit-awarding-body', ['unique_id' => $item->unique_id]) }}"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-edit me-3"></i> Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('delete-awarding-body', ['unique_id' => $item->unique_id]) }}"
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
                </div>
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

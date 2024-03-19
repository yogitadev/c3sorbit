@extends('admin.layouts.layout')

@section('page_title', 'Students')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Students' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Students',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.person.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')


    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Students</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @include ('admin.person.students._filter')
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            @if (isset($list) && count($list) > 0)
                <table class="table align-middle table-row-dashed" id="custom-data-list">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">Unique ID</th>
                            <th class="min-w-150px">
                                Name
                            </th>
                            <th class="min-w-125px">
                                V Reference Number
                            </th>
                            <th class="min-w-125px">Offer Letter</th>
                            <th class="min-w-125px">
                                Visa Letter
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
                                    {{ $item->name ?? '-'}} 
                                </td>
                                <td>
                                   {{$item->v_reference_no ?? '-'}}
                                </td>
                                <td>
                                    <?php
                                        $path =  $item->studentCol($item->v_reference_no);
                                    
                                    ?>
                                    <a href="{{ $path }}" target="_blank" class="btn btn-success btn-sm">COL</a> 
                                </td>
                                <td>
                                    <?php
                                        $path =  $item->studentVl($item->v_reference_no);
                                    
                                    ?>
                                    <a href="{{ $path }}" target="_blank" class="btn btn-success btn-sm">VL</a>
                                </td>

                                <td class="text-end">

                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                            class="fas fa-angle-down ms-1"></i>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">
                                        @can('students.view')
                                            <div class="menu-item px-3">
                                                <a href="{{ route('view-student', ['unique_id' => $item->unique_id]) }}"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-eye me-3"></i> View</a>
                                            </div>
                                        @endcan
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

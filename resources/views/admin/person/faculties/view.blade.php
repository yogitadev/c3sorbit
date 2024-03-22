@extends('admin.layouts.layout')

@section('page_title', 'View Faculty')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Faculties' => route('faculty-list'),
        $faculty_item->unqiue_id => '',
        'View' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'View Faculty',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.person.includes.header_menu')
@endsection

@section('content')

    @include('admin.includes.formErrors')
    @include('flash::message')

    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">View</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="{{ route('faculty-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <h4>Total Students:  {{ count($student_list)}}</h4>
            <table class="table align-middle table-row-dashed" id="custom-data-list">
                <thead>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th>Subject Name</th>
                        <th>Program Name</th>
                        <th>Student Details</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                    @foreach ($student_list as $item)
                        <tr>
                            <td>{{ $item['subject_name'] ?? '-'}}</td>
                            <td> {{ $item['programcode_name'] ?? '-'}}</td>
                            <td>
                                <b>Name: </b> {{ $item['name'] ?? '-'}}<br>
                                <b>Email: </b> {{ $item['email_id'] ?? '-'}} <br>
                                <b>Contact No: </b> {{ $item['mobile_number'] ?? '-'}} <br>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

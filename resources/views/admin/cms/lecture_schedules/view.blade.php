@extends('admin.layouts.layout')

@section('page_title', 'View Lecture Schedule')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'Lecture Schedules' => route('lecture-schedule-list'),
        'View' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'View Lecture Schedule',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection

@section('header-menu')
    @include('admin.cms.includes.header_menu')
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
                <a href="{{ route('lecture-schedule-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <h4>Total Students:  {{ count($item->student($item->programcode_id))}}</h4>
            {!! Form::model($item, ['method' => 'PUT', 'class' => 'form w-100 module_form','data-parsley-validate' => true,  'files' => true]) !!}
                <table class="table align-middle table-row-dashed" id="custom-data-list">
                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th>Student Name</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                        @foreach($item->student($item->programcode_id) as $student)
                            <tr>
                                <td>{{ $student->name ?? '-'}}</td>
                                <td>

                                    Pass 
                                    {!! Form::radio('selected_pass_ids[]', $student->id,false,['class' => 'form_control','disabled' => $student->lecture_student_present == null ? false : true ]) !!}
                                    Fail 
                                    {!! Form::radio('selected_fail_ids[]', $student->id,false,['class' => 'form_control', 'disabled' => $student->lecture_student_present == null ? false : true]) !!}
                                </td>
                                <td>
                                    @if($student->lecture_student_present != null)
                                    {!! \App\Helpers\Helper::showBadge($student->lecture_student_present->status) !!}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mb-4">Submit </button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

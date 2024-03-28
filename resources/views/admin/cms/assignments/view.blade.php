@extends('admin.layouts.layout')

@section('page_title', 'view Assignment')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'assignments' => route('assignment-list'),
        'View' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Assignment View',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.cms.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')
	<div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">View</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="{{ route('assignment-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
	</div>
        
		<div class="row g-5 g-xl-10 mb-5">
			<div class="col-xl-12">
				<div class="card h-md-100">
					<div class="card-header position-relative py-0 border-bottom-1">
						<h3 class="card-title text-gray-800 fw-bold">Student List</h3>
					</div>
					<div class="card-body d-flex flex-column ">
						<div class="">
							<b>Assignment Title : </b> {{ $item->assignment_title ?? '-'}} <br>
							<b>Subject Name : </b> {{ $item->subject->name ?? '-'}}
						</div>
						<div class="separator my-5"></div>
						<div>
							@if (isset($student_assignment_list) && count($student_assignment_list) > 0)
								<table class="table align-middle table-row-dashed" id="custom-data-list">
									<thead>
										<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
											<th>Student Name</th>
											<th>Submission Date</th>
											<th>Remark</th>
											<th>Attachment</th>
										</tr>
									</thead>
									<tbody>
										@foreach($student_assignment_list as $value)
											<tr>
												<td>
													{{ $value->student->name ?? '-' }}
												</td>
												<td>
													{{ $value->submission_date ?? '-'}}
												</td>
												<td>
													{{ $value->remark ?? '-' }}
												</td>
												<td>
													<a href="{{ $value->media->getUrl() }}"  class="menu-link px-3" download="{{$value->media->original_file_name}}"><i class="fas fa-download me-3" aria-hidden="true"></i>{{$value->media->original_file_name}}</a>
												</td>
												
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
					</div>
				</div>
			</div>
		</div>
		
@endsection
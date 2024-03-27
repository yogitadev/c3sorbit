@extends('admin.layouts.layout')

@section('page_title', 'view Student')

@section('sub_header')
    @php
    $breadcrumb_arr = [
        'students' => route('student-list'),
        'View' => '',
    ];
    @endphp
    @include('admin.layouts.sub_header', [
        'title' => 'Student View',
        'breadcrumb_arr' => $breadcrumb_arr,
    ])
@endsection


@section('header-menu')
    @include('admin.person.includes.header_menu')
@endsection

@section('content')
    @include('flash::message')
	<div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">View</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="{{ route('student-list') }}" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
	</div>
        <div class="row g-5 g-xl-10 mb-5">
			<div class="col-xl-5">
				<div class="card h-md-100">
					<div class="card-header position-relative py-0 border-bottom-1">
						<h3 class="card-title text-gray-800 fw-bold">Personal Details</h3>
					</div>
					<div class="card-body d-flex flex-column flex-center">
						<div>
							<table>
								<tr>
									<td class="fw-bold">Name </td>
									<td> : {{ $item->name ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Vista ID </td>
									<td>: {{ $item->vista_id ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">V Reference No </td>
									<td>: {{ $item->v_reference_no ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Lead Date </td>
									<td>: {{ $item->lead_date ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Lead Time </td>
									<td>: {{ $item->lead_time ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Country </td>
									<td>: {{ $item->country->name ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Country Code </td>
									<td>: {{ $item->country_code ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Mobile Number </td>
									<td>: {{ $item->mobile_number ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Email ID </td>
									<td>: {{ $item->email_id ?? '-'}}</td>
								</tr>
								<tr>
									<td class="fw-bold">Program code </td>
									<td>: {{ $item->programcode->program_name ?? '-'}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-7">
				<div class="card h-md-100">
					<div class="card-header position-relative py-0 border-bottom-1">
						<h3 class="card-title text-gray-800 fw-bold">Letter</h3>
					</div>
					<div class="card-body pb-0">
						<div>
							<h5>Visa Letter Archive</h5>
							<a  class="btn btn-sm btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archieve" data-vista-id="{{ $item->vista_id }}" data-unique-id="{{ $item->unique_id}}" data-type="vlletter"><i class="fas fa-file-pdf" ></i></a>
						</div>
						<div class="separator my-5"></div>
						<div>
							<h5>Offer Letter Archive</h5>
							<a  class="btn btn-sm btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archievecol" data-vista-id="{{ $item->vista_id }}" data-unique-id="{{ $item->unique_id}}" data-type="colletter"><i class="fas fa-file-pdf" ></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-5 g-xl-10">
			<div class="col-xl-12">
				<div class="card h-md-100">
					<div class="card-header position-relative py-0 border-bottom-1">
						<h3 class="card-title text-gray-800 fw-bold">Lecture Schedule</h3>
					</div>
					<div class="card-body d-flex flex-column ">
						<div>
						@if (isset($lecture_list) && count($lecture_list) > 0)
							<table class="table align-middle table-row-dashed" id="custom-data-list">
								<thead>
									<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
										<th>Subject Name</th>
										<th>Lecture Date</th>
										<th>Lecture Time</th>
										<th>Assignment Title</th>
									</tr>
								</thead>
								<tbody>
									@foreach($lecture_list as $lecture)
										<tr>
											<td>
												{{ $lecture->subject->name ?? '-' }}
											</td>
											<td>
												{{ $lecture->lecture_date ?? '-' }}
											</td>
											<td>
												{{ $lecture->lecture_time ?? '-' }}
											</td>
											<td>
												{!! \App\Helpers\Helper::assignment_title($lecture->subject_id) !!}
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
		<div class="modal fade" id="kt_modal_archieve" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-1000px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="fas fa-times fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y m-5">
						<!--begin:Form-->
						
							<div class="mb-5 text-center">
								<h1 class="">Archive Visa Letter</h1>
							</div>
							<div class="separator my-5"></div>
							<table class="table align-middle table-row-dashed">
                                <thead>
                                    <tr class="text-start fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">Date</th>
                                        <th class="min-w-125px">
                                            VL
                                        </th>
                                        <th class="min-w-125px">
                                            Admision Letter
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold archiveop">
                                    
                                </tbody>
                            </table>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<div class="modal fade" id="kt_modal_archievecol" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-1000px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="fas fa-times fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y m-5">
						<!--begin:Form-->
						
							<div class="mb-5 text-center">
								<h1 class="">Archive Offer Letter</h1>
							</div>
							<div class="separator my-5"></div>
							<table class="table align-middle table-row-dashed">
                                <thead>
                                    <tr class="text-start fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">Date</th>
                                        <th class="min-w-125px">
                                            COL
                                        </th>
                                        <th class="min-w-125px">
                                            Admision Year
                                        </th>
										<th class="min-w-125px">
                                            Intake
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold archivecol">
                                    
                                </tbody>
                            </table>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
@endsection
@push('page_js')
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $(".archievedata").on("click",function(){
                var vista_id = $(this).attr("data-vista-id");
				var unique_id = $(this).attr("data-unique-id");
				var type = $(this).attr("data-type");
				if(type == 'vlletter') {
					var url = "{{ route('view-student', ['unique_id' => ":unique_id"]) }}"+"?vista_id="+vista_id+"&archive=Yes&vl=Yes";
					url = url.replace(':unique_id', unique_id);
					$.ajax({
               		type: 'GET',
                	url: url,
                	success: function(e) {
						$(".archiveop").html("");
						$(".archiveop").append(e);
					},
				});
				} else {
					var url = "{{ route('view-student', ['unique_id' => ":unique_id"]) }}"+"?vista_id="+vista_id+"&archive=Yes&col=Yes";
					url = url.replace(':unique_id', unique_id);
					$.ajax({
               		type: 'GET',
                	url: url,
                	success: function(e) {
							$(".archivecol").html("");
							$(".archivecol").append(e);
					},
				});
				}
			});
		});
	});
</script>
@endpush

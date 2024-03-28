<?php $__env->startSection('page_title', 'view Student'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'students' => route('student-list'),
        'View' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Student View',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.person.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">View</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('student-list')); ?>" class="btn btn-danger"><i
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
									<td> : <?php echo e($item->name ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Vista ID </td>
									<td>: <?php echo e($item->vista_id ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">V Reference No </td>
									<td>: <?php echo e($item->v_reference_no ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Lead Date </td>
									<td>: <?php echo e($item->lead_date ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Lead Time </td>
									<td>: <?php echo e($item->lead_time ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Country </td>
									<td>: <?php echo e($item->country->name ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Country Code </td>
									<td>: <?php echo e($item->country_code ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Mobile Number </td>
									<td>: <?php echo e($item->mobile_number ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Email ID </td>
									<td>: <?php echo e($item->email_id ?? '-'); ?></td>
								</tr>
								<tr>
									<td class="fw-bold">Program code </td>
									<td>: <?php echo e($item->programcode->program_name ?? '-'); ?></td>
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
							<a  class="btn btn-sm btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archieve" data-vista-id="<?php echo e($item->vista_id); ?>" data-unique-id="<?php echo e($item->unique_id); ?>" data-type="vlletter"><i class="fas fa-file-pdf" ></i></a>
						</div>
						<div class="separator my-5"></div>
						<div>
							<h5>Offer Letter Archive</h5>
							<a  class="btn btn-sm btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archievecol" data-vista-id="<?php echo e($item->vista_id); ?>" data-unique-id="<?php echo e($item->unique_id); ?>" data-type="colletter"><i class="fas fa-file-pdf" ></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-5 g-xl-10 mb-5">
			<div class="col-xl-12">
				<div class="card h-md-100">
					<div class="card-header position-relative py-0 border-bottom-1">
						<h3 class="card-title text-gray-800 fw-bold">Lecture Schedule</h3>
					</div>
					<div class="card-body d-flex flex-column ">
						<div>
						<?php if(isset($lecture_list) && count($lecture_list) > 0): ?>
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
									<?php $__currentLoopData = $lecture_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td>
												<?php echo e($lecture->subject->name ?? '-'); ?>

											</td>
											<td>
												<?php echo e($lecture->lecture_date ?? '-'); ?>

											</td>
											<td>
												<?php echo e($lecture->lecture_time ?? '-'); ?>

											</td>
											<td>
												<?php echo \App\Helpers\Helper::assignment_title($lecture->subject_id); ?>

											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						<?php else: ?>
							<div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    			<i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
								<div class="d-flex flex-column">
									<h4 class="text-warning mb-0 fw-normal">No Data Found</h4>
								</div>
                			</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.assignment_submit')): ?>
			<div class="row g-5 g-xl-10 mb-5">
				<div class="col-xl-12">
					<div class="card h-md-100">
						<div class="card-header position-relative py-0 border-bottom-1">
							<h3 class="card-title text-gray-800 fw-bold">Assignment Submit</h3>
						</div>
						<div class="card-body d-flex flex-column ">
							<div>
							<?php if(isset($assignment_list) && count($assignment_list) > 0): ?>
								<table class="table align-middle table-row-dashed" id="custom-data-list">
									<thead>
										<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
											<th>Subject Name</th>
											<th>Assignment Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $assignment_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td>
													<?php echo e($assignment['subject_name'] ?? '-'); ?>

												</td>
												<td>
													<?php echo e($assignment['assignment_title'] ?? '-'); ?>

												</td>
												<td>
													<a  class="btn btn-sm btn-primary assignmentsubmit" data-bs-toggle="modal" data-bs-target="#kt_modal_assigmentsubmit" data-student-id="<?php echo e($item->id); ?>" data-subject-id="<?php echo e($assignment['subject_id']); ?>

													" data-assignment-id="<?php echo e($assignment['assignment_id']); ?>" 
													style="<?php echo e($assignment['status'] == 'pending' ? 'pointer-events: auto;opacity: 1;' : 'pointer-events: none;opacity: 0.5;'); ?>"
													style="pointer-events: none">Submit</a>
												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							<?php else: ?>
								<div class="alert alert-warning d-flex align-items-center p-5 mb-10">
									<i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
									<div class="d-flex flex-column">
										<h4 class="text-warning mb-0 fw-normal">No Data Found</h4>
									</div>
								</div>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
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
		<div class="modal fade" id="kt_modal_assigmentsubmit" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-500px">
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
								<h1 class="">Assignment Submit</h1>
							</div>
							<div class="separator my-5"></div>
							<?php echo Form::open(['class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true, 'route' => 'assignment-submit-student', 'method' => 'POST']); ?>

								<div class="d-flex flex-column mb-8 fv-row">
									
									<label class="form-label required fs-6">Document</label>
									<?php echo Form::file('media', ['class' => 'form-control','accept' => '.doc, .dox, .pdf','required' => true ]); ?>

								</div>
								<div class="d-flex flex-column mb-8 fv-row">
									<label class="form-label fs-6">Remark</label>
									<?php echo Form::textarea('remark', null, ['class' => 'form-control']); ?>

								</div>
								
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							<?php echo Form::close(); ?>

						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $(".archievedata").on("click",function(){
                var vista_id = $(this).attr("data-vista-id");
				var unique_id = $(this).attr("data-unique-id");
				var type = $(this).attr("data-type");
				if(type == 'vlletter') {
					var url = "<?php echo e(route('view-student', ['unique_id' => ":unique_id"])); ?>"+"?vista_id="+vista_id+"&archive=Yes&vl=Yes";
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
					var url = "<?php echo e(route('view-student', ['unique_id' => ":unique_id"])); ?>"+"?vista_id="+vista_id+"&archive=Yes&col=Yes";
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
			$(".assignmentsubmit").on("click",function(){
				var student_id = $(this).attr("data-student-id");
				var subject_id = $(this).attr("data-subject-id");
				var assignment_id = $(this).attr("data-assignment-id");
				
				$('<input>').attr({ type: 'hidden', id: 'student_id', name: 'student_id'}).appendTo('form').val(student_id);
				$('<input>').attr({ type: 'hidden', id: 'subject_id', name: 'subject_id'}).appendTo('form').val(subject_id);
				$('<input>').attr({ type: 'hidden', id: 'assignment_id', name: 'assignment_id'}).appendTo('form').val(assignment_id);
			});
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/person/students/view.blade.php ENDPATH**/ ?>
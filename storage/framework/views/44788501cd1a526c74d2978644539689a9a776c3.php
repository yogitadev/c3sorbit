<?php $__env->startSection('page_title', 'Screening'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Screening' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Screening',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.screen_management.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Screening</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.screen_management.screens._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            <?php if(isset($list) && count($list) > 0): ?>
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed" id="custom-data-list">

                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-125px">
                                App. Date
                                </th>
                                <th class="min-w-125px">
                                    Passport
                                </th>
                                <th class="min-w-125px">Full Name</th>
                                <th class="min-w-125px">Course Code</th>
                                <th class="min-w-125px">Reference Number</th>
                                <th class="min-w-125px">C.Code</th>
                                <th class="min-w-125px">A.Code</th>
                                <th class="min-w-125px">Schedule</th>
                                <th class="min-w-125px">Int Name</th>
                                <th class="min-w-125px">Feedback</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>


                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($key + 1); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->lead_date); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->passport_number ??  '-'); ?> <br>
                                        <?php echo e($item->student_application->nationality_country->name ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->title); ?> <?php echo e($item->student_application->first_name  ?? '-'); ?> <?php echo e($item->student_application->last_name ?? '-'); ?> <br>
                                        <?php echo e($item->student_application->email_id  ?? '-'); ?> <br>
                                        <?php echo e($item->student_application->mobile_no ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->programcode->program_code ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->v_reference_no ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->user->emp_code ?? '-'); ?>

                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->studentInterview->interview_date ?? 'Pending'); ?> <?php echo e($item->student_application->studentInterview->interview_time ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->studentInterview->user->first_name ?? '-'); ?> <?php echo e($item->student_application->studentInterview->user->last_name ?? ''); ?> <br>
                                        <?php echo e($item->student_application->studentInterview->interview_mode->title ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php if($item->vista_status_id == 7): ?>
                                            <button type="button" style="padding: 10px 10px;" class=" btn-fill-lg  btn btn-success itemdata" data-bs-toggle="modal" data-bs-target="#kt_modal_feedback" title="Click To View Feedback" alt="Click To View Feedback" data-action="Pass" data-date="<?php echo e($item->student_application->studentInterview->interview_date ?? ''); ?>" data-time="<?php echo e($item->student_application->studentInterview->interview_time ?? ''); ?>" data-feedback="<?php echo e($item->student_application->studentInterview->feedback ?? ''); ?>" data-interviewer="<?php echo e($item->student_application->studentInterview->user->first_name ?? '-'); ?> <?php echo e($item->student_application->studentInterview->user->last_name ?? ''); ?>">  <i class="fas fa-thumbs-up"></i>  </button>
                                        <?php endif; ?>
                                        <?php if($item->vista_status_id == 8): ?>
                                            <button type="button" style="padding: 10px 10px;" class=" btn-fill-lg  btn btn-danger itemdata" data-bs-toggle="modal" data-bs-target="#kt_modal_feedback" title="Click To View Feedback" alt="Click To View Feedback" data-action="Fail" data-date="<?php echo e($item->student_application->studentInterview->interview_date ?? ''); ?>" data-time="<?php echo e($item->student_application->studentInterview->interview_time ?? ''); ?>" data-feedback="<?php echo e($item->student_application->studentInterview->feedback ?? ''); ?>" data-interviewer="<?php echo e($item->student_application->studentInterview->user->first_name ?? '-'); ?> <?php echo e($item->student_application->studentInterview->user->last_name ?? ''); ?>">  <i class="fas fa-thumbs-down"></i>  </button>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            <?php if($item->vista_status_id == 5): ?>
                                                <div class="menu-item px-3">
                                                    <a href="<?php echo e(route('create-interview', ['lead_id' => $item->id])); ?>"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-calendar-check"></i> Scedule Interview</a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($item->vista_status_id == 6 || $item->vista_status_id == 8): ?>
                                                <div class="menu-item px-3">
                                                    <a href="<?php echo e(route('edit-interview', ['lead_id' => $item->id])); ?>"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-sync-alt"></i> Re Scedule Interview</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
                    <!--end::Svg Icon-->
                    <div class="d-flex flex-column">
                        <h4 class="text-warning mb-0 fw-normal">No Data Found</h4>
                    </div>
                </div>

            <?php endif; ?>
        </div>
        <div class="modal fade" id="kt_modal_feedback" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
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
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
						<!--begin:Form-->
						
							<div class="mb-13 text-center">
								<h1 class="mb-3">Interview Feedback</h1>
							</div>
							<div class="separator my-5"></div>
                            <h3 class="action"></h3>
							<div class="d-flex flex-column mb-8 fv-row">
								<p class="datetime"><b>Interview DateTime : </b></p>
                                <p class="interviewer"><b>Interviewer : </b></p>
							</div>
                            <br>
                            <br>

                            <div class="d-flex flex-column mb-8 fv-row">
								<p class="itemfeedback">
                                
                                </p>
							</div>
							
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>

        <?php if($list->hasPages()): ?>
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    <?php echo $list->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            
            $(".itemdata").on("click", function() {
                
                var action = $(this).attr("data-action");
                var date = $(this).attr("data-date");
                var time = $(this).attr("data-time");
                var feedback = $(this).attr("data-feedback");
                var interviewer = $(this).attr("data-interviewer");
                var dateTime = date + " " + time;
                $(".action").html(action);
                $(".datetime").append(dateTime);
                $(".itemfeedback").html(feedback);
                $(".interviewer").append(interviewer);
                
            }); 
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/screen_management/screens/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title', 'Conditional Letter'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Conditional Letter' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Conditional Letter',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.letter.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="messages"></div>
    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Conditional Letter</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.letter.conditional_letters._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <th class="min-w-75px">
                                    Type
                                </th>
                                <th class="min-w-150px">
                                    COL
                                </th>
                                <th class="min-w-125px">Gen COL</th>
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-150px">
                                    Nationality
                                </th>
                                <th class="min-w-150px">Course</th>
                                <th class="min-w-150px">CIntake</th>
                                <th class="min-w-100px">OIntake</th>
                                <th class="min-w-100px">Sales</th>
                                <th class="min-w-100px">Auth User</th>
                                <th class="min-w-100px">Remark</th>
                                <th class="min-w-100px">Feedback</th>
                                <th class="min-w-100px">Archive</th>
                                <th class="min-w-100px">App Date</th>
                                <th class="min-w-100px">Email OL</th>
                                <th class="min-w-100px">ACode</th>
                                <th class="min-w-100px">Passport</th>
                                <th class="min-w-100px">Reference Number</th>
                                <th class="min-w-100px">Formal Program Name</th>
                                <th class="min-w-100px">Year</th>
                            </tr>
                        </thead>
    
    
                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($item->student_col_offer->type ?? '-'); ?></td>
                                    <td>
                                        <?php if($item->student_col_offer != null || $item->student_add_course != null): ?>
                                        <?php
                                        $data = $item->student_col_offer_archieve;
                                        $count = count($data);
                                        
                                        if($item->student_col_offer->media_id != null)
                                        $path = \Storage::url('uploads/media/offer_letter/'.$item->student_col_offer_archieve[$count-1]->media->original_file_name);
                                        //$path = asset('storage/uploads/media/offer_letter/'.$item->student_col_offer->media->original_file_name)
                                       
                                         ?>
                                         <?php if($item->student_col_offer->media_id != null) { ?>
                                            <a href="<?php echo e($path); ?>" target="_blank"><i class="fas fa-file-pdf text-primary" ></i> <?php echo e(date("d/m/Y", strtotime($item->student_col_offer_archieve[$count-1]->created_at)) ?? '-'); ?></a>
                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                        
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->student_col_offer != null): ?>
                                            <a href="<?php echo e(route('edit-studentCOL',['lead_id' => $item->id ,'type' => 'Regenerate'] )); ?>" class="btn btn-danger btn-sm">
                                                <?php echo e(date("d/m/Y", strtotime($item->student_col_offer_archieve[$count-1]->created_at)) ?? '-'); ?>

                                            </a>
                                        <?php elseif($item->student_add_course != null): ?>
                                            <a href="<?php echo e(route('edit-studentCOL',['lead_id' => $item->id, 'type' => 'Generate'] )); ?>" class="btn btn-warning btn-sm">
                                                <?php echo e(date("d/m/Y", strtotime($item->student_add_course->created_at)) ?? '-'); ?>

                                            </a>
                                        <?php elseif($item->student_add_course == null): ?>
                                            <a href="<?php echo e(route('create-studentCOL',['lead_id' => $item->id] )); ?>" class="btn btn-primary btn-sm">
                                                Add Course
                                            </a>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->name  ?? '-'); ?> </td>
                                    <td><?php echo e($item->student_application->nationality_country->name ?? '-'); ?></td>
                                    <td><?php echo e($item->student_col_offer->programcode->program_code ?? $item->student_application->programcode->program_code); ?></td>
                                    <td>
                                        <?php if($item->student_col_offer != null): ?>
                                            <?php echo e($item->student_col_offer->intake); ?> <?php echo e($item->student_col_offer->admission_year); ?>

                                        <?php else: ?> 
                                            <?php echo e($item->student_application->intake->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                        <?php echo e($item->sales_user->first_name ?? '-'); ?> <?php echo e($item->sales_user->last_name ?? ' '); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_col_offer->user->first_name ?? '-'); ?> <?php echo e($item->student_col_offer->user->last_name ?? ''); ?> 
    
                                    </td>
                                    <td style="position:relative;">
                                        <textarea style="height:45px" name="ol_remarks" id="remarks_<?php echo e($item->id); ?>" required=""></textarea> 
                                        <input type="hidden" name="istudent_id"  value="<?php echo e($item->id); ?>">
                                        <button style="position:absolute;right: 8%;" type="submit"  class="ol_remarks_save" data-id="<?php echo e($item->id); ?>">Save</button>
                                    </td>
                                    <td>
                                        <button type="button" style="padding: 10px 16px;" class="modal-trigger btn btn-primary itemdata" data-bs-toggle="modal" data-bs-target="#modal_feedback" title="Click To View Feedback" alt="Click To View Feedback" data-action="Pass"  data-date="<?php echo e($item->student_application->studentInterview->interview_date ?? ''); ?>" data-time="<?php echo e($item->student_application->studentInterview->interview_time ?? ''); ?>" data-feedback="<?php echo e($item->student_application->studentInterview->feedback ?? ''); ?>" data-interviewer="<?php echo e($item->student_application->studentInterview->user->first_name ?? '-'); ?> <?php echo e($item->student_application->studentInterview->user->last_name ?? ''); ?>"><i class="fas fa-comments"></i> </button>
                                    </td>
                                    <td>
                                        <a style="padding: 10px 16px;background: #138d41;" class="btn-fill-md radius-2  btn btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archieve" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-file-pdf" ></i></a>
                                    </td>
                                    <td>
                                        <?php echo e($item->lead_date); ?>

                                    </td>
                                    <td>
                                        Email OL
                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->passport_number ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->v_reference_no ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_col_offer->formal_program_name ?? '-'); ?> 
                                    </td>
                                    <td>
                                        First Year
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

        <div class="modal fade" id="modal_feedback" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
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
                                            Admission Year
                                        </th>
                                        <th class="min-w-125px">
                                            Intake
                                        </th>
                                        <th class="min-w-125px">Auth User</th>
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
            $(".archievedata").on("click",function() {
                var student_id = $(this).attr("data-student-id");
                $.ajax({
                type: 'GET',
                url: '<?php echo e(route('studentCOL-list')); ?>'+'?student_id='+student_id+'&archive=Yes',
                success: function(e) {
                    $(".archiveop").html("");
                    $(".archiveop").append(e);
                },
                });
            });
            $(".ol_remarks_save").on("click",function() {
               
                var student_id = $(this).attr("data-id");
                var remark = $("#remarks_"+student_id).val();
                var url = "<?php echo e(route('update-studentCOL', ['lead_id' => ":lead_id", 'type' => 'Generate'])); ?>";
                url = url.replace(':lead_id', student_id);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { '_token': '<?php echo e(csrf_token()); ?>',
                        'action' : 'remark_add',
                        'sales_remark' : $("#remarks_"+student_id).val(),
                        'lead_id' : student_id,
                        'type' : 'Generate',
                    },
                    success: function(data) {
                        console.log(data.sales_remark);
                        var messages = $('.messages');

                        var successHtml = '<div class="alert alert-success" role="alert">Remark Updated Successfully.</div>';

                        $(messages).html(successHtml);
                    },
                });
            });
           
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/conditional_letters/index.blade.php ENDPATH**/ ?>
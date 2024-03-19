<?php $__env->startSection('page_title', 'My Pending Interview'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'My Pending Interview' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'My Pending Interview',
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
                <h3 class="fw-bolder m-0">My Pending Interview</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.screen_management.interviews._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                Interviewer
                                </th>
                                <th class="min-w-125px">
                                    Coordinator
                                </th>
                                <th class="min-w-125px">Passport</th>
                                <th class="min-w-125px">Full Name</th>
                                <th class="min-w-125px">Course Code</th>
                                <th class="min-w-125px">Mode</th>
                                <th class="min-w-125px">Interview Date</th>
                                <th class="min-w-125px">Interview Time</th>
                                <th class="min-w-125px">DOB</th>
                                <th class="min-w-125px">P.Country</th>
                                <th class="min-w-125px">Archive</th>
                                <th class="min-w-125px">Vref Number</th>
                                <th class="min-w-125px">Institution</th>
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
                                        <?php echo e($item->user->first_name ?? '-'); ?> <?php echo e($item->user->last_name ?? ''); ?>

                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->passport_number ?? '-'); ?> <br>
                                        
                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->first_name  ?? '-'); ?> <?php echo e($item->student_application->last_name ?? ''); ?>

                                    </td>
                                    <td>
                                    <?php echo e($item->programcode->program_code ?? '-'); ?>

                                    </td>
                                    
                                    <td>
                                        <?php echo e($item->interview_mode->title ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->interview_date ?? '-'); ?> 
                                    </td>
                                    <td>
                                        <?php echo e($item->interview_time ?? '-'); ?>

                                    </td>
                                    <td>
                                    <?php echo e($item->student_application->dob ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->nationality_country->name ?? '-'); ?>

                                    </td>
                                    <td>
                                        <a style="padding: 10px 16px;background: #138d41;" class="btn-fill-md radius-2  btn btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archieve" data-student-id="<?php echo e($item->student->id); ?>"><i class="far fa-file-pdf" ></i></a>
                                    </td>
                                    <td>
                                        <?php echo e($item->student->v_reference_no ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->programcode->institution->name ?? '-'); ?>

                                    </td>
                                    <td class="text-end">

                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            
                                                <div class="menu-item px-3">
                                                    <a href="#"
                                                            class="menu-link px-3 passitem" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" data-id="<?php echo e($item->id); ?>" data-name="<?php echo e($item->student_application->first_name  ?? ''); ?> <?php echo e($item->student_application->last_name ?? ''); ?>">
                                                            <i class="fas fa-check"></i> Pass</a>
                                                </div>
                                            
                                                <div class="menu-item px-3">
                                                    <a href="#"
                                                            class="menu-link px-3 failitem" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" data-id="<?php echo e($item->id); ?>" data-name="<?php echo e($item->student_application->first_name  ?? ''); ?> <?php echo e($item->student_application->last_name ?? ''); ?>">
                                                            <i class="fas fa-times"></i> Fail</a>
                                                </div>
                                            
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
        <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
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
                        <?php echo Form::open(['class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

						
							<div class="mb-13 text-center">
								<h1 class="mb-3 student_name"></h1>
							</div>
							
							<div class="d-flex flex-column mb-8 fv-row" id="recordhide">
								
								<label class="form-label fs-6">Recording URL</label>
                                <?php echo Form::text('recording_url', null, ['class' => 'form-control', 'id' => 'recording_url']); ?>

							</div>
                            <div class="d-flex flex-column mb-8 fv-row">
								<label class="form-label fs-6">Remark</label>
                                <?php echo Form::textarea('feedback', null, ['class' => 'form-control ckeditor', 'id' => 'feedback']); ?>

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
                        <?php echo Form::open(['class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

						
							<div class="mb-5 text-center">
								<h1 class="">Archive Feedback</h1>
							</div>
							<div class="separator my-5"></div>
							<table class="table align-middle table-row-dashed">
                                <thead>
                                    <tr class="text-start fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">ID</th>
                                        <th class="min-w-125px">
                                        DateTime
                                        </th>
                                        <th class="min-w-125px">
                                            Employee Name
                                        </th>
                                        <th class="min-w-125px">Course Code</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="min-w-125px">Feedback</th>
                                        <th class="min-w-125px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold archiveop">
                                    
                                </tbody>
                            </table>
                        <?php echo Form::close(); ?>

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
<script type="text/javascript" src="<?php echo e(asset('themes/admin/third_party/ckeditor5/build/ckeditor.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/editor.js')); ?>"></script>
<script type="text/javascript">
    function editFeedback(el){
        var id = $(el).attr('data-id');
        var feedback = $(el).attr('data-feedback');
        $("#feedback_"+id).html("<textarea class='form-control' id="+id+">"+feedback+"</textarea>");
        $("#edit_feedback"+id).addClass("d-none");
        $("#save_feedback"+id).removeClass("d-none");
        $("#close_feedback"+id).removeClass("d-none");
    }
    function saveFeedback(el){
        var id = $(el).attr('data-id');
        
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('update-pending-interview')); ?>'+'?archive=Yes',
            data: { '_token': '<?php echo e(csrf_token()); ?>',
                    'feedback' : $("#"+id).val(),
                    'id' : id
                    },
            success: function(data) {
                location.reload();
            }
        });
        
    } 
    function closeFeedback(el) {
        var id = $(el).attr('data-id');
        var feedback = $(el).attr('data-feedback');
        $("#feedback_"+id).html(feedback);
        $("#edit_feedback"+id).removeClass("d-none");
        $("#save_feedback"+id).addClass("d-none");
        $("#close_feedback"+id).addClass("d-none");
    }
    $(function() {
        $(document).ready(function(){
            
            $(".passitem").on("click", function() {
                $("#recordhide").removeClass('d-none');
                var student_id = $(this).attr("data-id");
                var name = $(this).attr("data-name");
                $(".student_name").html(name);
                $('<input>').attr({ type: 'hidden', id: 'id', name: 'id'}).appendTo('form').val(student_id);
                $('<input>').attr({ type: 'hidden', id: 'action', name: 'action'}).appendTo('form').val('pass');
            }); 
            $(".failitem").on("click", function() {
                $("#recordhide").addClass('d-none');
                var student_id = $(this).attr("data-id");
                var name = $(this).attr("data-name");
                
                $(".student_name").html(name);
                $('<input>').attr({ type: 'hidden', id: 'id', name: 'id'}).appendTo('form').val(student_id);
                $('<input>').attr({ type: 'hidden', id: 'action', name: 'action'}).appendTo('form').val('fail');
            }); 
            $(".archievedata").on("click",function() {
                var student_id = $(this).attr("data-student-id");
                
                $.ajax({
                type: 'GET',
                url: '<?php echo e(route('pending-interview')); ?>'+'?student_id='+student_id+'&archive=Yes',
                success: function(e) {
                    $(".archiveop").html("");
                    $(".archiveop").append(e);
                },
                });
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/screen_management/interviews/pending_interview.blade.php ENDPATH**/ ?>
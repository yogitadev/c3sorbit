<?php $__env->startSection('page_title', 'Visa Letter'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Visa Letter' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Visa Letter',
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
                <h3 class="fw-bolder m-0">Visa Letter</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.letter.visa_letters._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    Admission Letter
                                </th>
                                <th class="min-w-100px">
                                    VL
                                </th>
                                <th class="min-w-125px">Full Name</th>
                                <th class="min-w-125px">Ref. No</th>
                                <th class="min-w-150px">
                                    Gen VL
                                </th>
                                <th class="min-w-150px">Generate E-sign</th>
                                <th class="min-w-150px">Eng.</th>
                                <th class="min-w-150px">Ext.</th>
                                <th class="min-w-100px">ACode</th>
                                <th class="min-w-100px">OIntake</th>
                                <th class="min-w-100px">CIntake</th>
                                <th class="min-w-100px">Total Paid</th>
                                <th class="min-w-100px">Discount</th>
                                <th class="min-w-100px">Sales</th>
                                <th class="min-w-100px">Remarks</th>
                                <th class="min-w-100px">App Date</th>
                                <th class="min-w-100px">Passport No</th>
                                <th class="min-w-100px">COL</th>
                                <th class="min-w-100px">Auth User</th>
                                <th class="min-w-100px">Course</th>
                                <th class="min-w-75px">Archive</th>
                            </tr>
                        </thead>
    
    
                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($key+1); ?>

                                    </td>
                                    <td>
                                        <?php echo e(($item->vl_letter($item->id)->type) ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php if($item->vl_letter($item->id) != null && $item->vl_letter($item->id)->media != null): ?>
                                            <?php $path = \Storage::url('uploads/media/visa_letter/'.$item->vl_letter($item->id)->media->original_file_name);
                                            ?>
                                        
                                            <a href="<?php echo e($path); ?>" target="_blank" class="btn btn-success btn-sm"><?php echo e(date("d/m/Y", strtotime($item->vl_letter($item->id)->updated_at)) ?? '-'); ?></a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->name ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->v_reference_no ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php if($item->vl_letter($item->id) != null && $item->vl_letter($item->id)->media != null): ?>
                                            <?php 
                                                if($item->vl_letter($item->id)->e_sign == 'Yes')
                                                    $style = 'cursor: none; opacity: 0.6;';
                                                else
                                                    $style = '';
                                            ?>  
                                            
                                            <a href="<?php echo e(route('create-studentVL',['lead_id' => $item->id, 'type' => 'ReGenerate'] )); ?>" class="btn btn-danger btn-sm" style="<?php echo e($style); ?>"><i class="fas fa-sync-alt"></i></i> </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('create-studentVL',['lead_id' => $item->id, 'type' => 'Generate'] )); ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <?php if($item->vl_letter($item->id) != null && $item->vl_letter($item->id)->media != null): ?>

                                            <a href="<?php echo e(route('create-studentVL',['lead_id' => $item->id, 'type' => 'ReGenerate-EStamp'] )); ?>" class="btn btn-primary btn-sm">E.Stamp </a>
                                        <?php else: ?>
                                           Pending
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->epl_letter($item->id) != null): ?>
                                            <?php $path = \Storage::url('uploads/media/visa_letter/'.$item->epl_letter($item->id)->media->original_file_name);?>
                                        
                                            <a href="<?php echo e($path); ?>" target="_blank" class="btn btn-success btn-sm" ><i class="fas fa-file-pdf" ></i> </a>

                                            <btn class="btn btn-danger btn-sm epl_regenerate" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-sync-alt"></i></btn>
                                        <?php else: ?>
                                            <btn class="btn btn-primary btn-sm epl_regenerate" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-plus" ></i> </btn>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->el_letter($item->id) != null): ?>
                                            <?php $path = \Storage::url('uploads/media/visa_letter/'.$item->el_letter($item->id)->media->original_file_name);?>
                                        
                                            <a href="<?php echo e($path); ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-file-pdf" ></i> </a>

                                            <btn class="btn btn-danger btn-sm el_regenerate" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-sync-alt"></i></btn>
                                        <?php else: ?>
                                            <btn class="btn btn-primary btn-sm el_regenerate" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-plus" ></i> </btn>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                        ***
                                    </td>
                                    <td>
                                       C:: <?php echo e($item->student_application->intake->name ?? '-'); ?>

                                    </td>
                                    <td>
                                        &#8364;<?php echo e($item->approve($item->id) ?? 0); ?>

                                    </td>
                                    <td>
                                        &#8364;<?php echo e($item->discount($item->id) ?? 0); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->sales_user->first_name ?? '-'); ?> <?php echo e($item->sales_user->last_name ?? '-'); ?>

                                    </td>
                                    <td style="position:relative;">
                                        <textarea style="height:45px" name="vl_remarks" id="remarks_<?php echo e($item->id); ?>" required=""><?php echo $item->vl_letter($item->id)->remarks ?? ''; ?></textarea> 
                                        <input type="hidden" name="istudent_id"  value="<?php echo e($item->id); ?>">
                                        <button style="position:absolute;right: 8%;" type="submit"  class="vl_remarks_save" data-id="<?php echo e($item->id); ?>">Save</button>
                                    </td>
                                    <td>
                                        <?php echo e($item->lead_date ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->student_application->passport_number ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php if($item->student_col_offer != null ): ?>
                                            <?php
                                            if($item->student_col_offer->media_id != null)
                                            $data = $item->student_col_offer_archieve;
                                            $count = count($data);

                                            $path = \Storage::url('uploads/media/offer_letter/'.$item->student_col_offer_archieve[$count-1]->media->original_file_name);
                                        
                                            ?>
                                            <?php if($item->student_col_offer->media_id != null) { ?>
                                                <a href="<?php echo e($path); ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-file-pdf" ></i> </a>
                                            <?php } else { ?>
                                                -
                                            <?php } ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->user->first_name ?? '-'); ?> <?php echo e($item->user->last_name ?? ' '); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->programcode->program_name ?? '-'); ?>

                                    </td>
                                    <td>
                                        <a  class="btn btn-sm btn-success archievedata" data-bs-toggle="modal" data-bs-target="#kt_modal_archieve" data-student-id="<?php echo e($item->id); ?>"><i class="fas fa-file-pdf" ></i></a>
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
                                            Admission Year
                                        </th>
                                        <th class="min-w-125px">
                                            Intake
                                        </th>
                                        <th class="min-w-125px">
                                            Admision Letter
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
            
            $(".archievedata").on("click",function() {
                var student_id = $(this).attr("data-student-id");
                $.ajax({
                type: 'GET',
                url: '<?php echo e(route('studentVisaLetter-list')); ?>'+'?student_id='+student_id+'&archive=Yes',
                success: function(e) {
                    $(".archiveop").html("");
                    $(".archiveop").append(e);
                },
                });
            });
            $(".vl_remarks_save").on("click",function() {
               
                var student_id = $(this).attr("data-id");
                var remark = $("#remarks_"+student_id).val();
                var url = "<?php echo e(route('store-studentVL', ['lead_id' => ":lead_id", 'type' => 'Generate'])); ?>";
                url = url.replace(':lead_id', student_id);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { '_token': '<?php echo e(csrf_token()); ?>',
                        'action' : 'remark_add',
                        'remarks' : $("#remarks_"+student_id).val(),
                        'lead_id' : student_id,
                        'type' : 'Generate',
                    },
                    success: function(data) {
                        var messages = $('.messages');

                        var successHtml = '<div class="alert alert-success" role="alert">Remark Updated Successfully.</div>';

                        $(messages).html(successHtml);
                    },
                });
            });
            $(".epl_regenerate").on("click",function() {
               var student_id = $(this).attr("data-student-id");
               var url = "<?php echo e(route('store-studentVL', ['lead_id' => ":lead_id", 'type' => 'ReGenerate'])); ?>";
               url = url.replace(':lead_id', student_id);

               $.ajax({
                   type: 'POST',
                   url: url,
                   data: { '_token': '<?php echo e(csrf_token()); ?>',
                       'action' : 'epl_regenerate',
                       'lead_id' : student_id,
                       'type' : 'ReGenerate',
                   },
                   success: function(data) {
                       location.reload();
                   },
               });
           });
           $(".el_regenerate").on("click",function() {
               var student_id = $(this).attr("data-student-id");
               var url = "<?php echo e(route('store-studentVL', ['lead_id' => ":lead_id", 'type' => 'ReGenerate'])); ?>";
               url = url.replace(':lead_id', student_id);

               $.ajax({
                   type: 'POST',
                   url: url,
                   data: { '_token': '<?php echo e(csrf_token()); ?>',
                       'action' : 'el_regenerate',
                       'lead_id' : student_id,
                       'type' : 'ReGenerate',
                   },
                   success: function(data) {
                       location.reload();
                   },
               });
           });
            
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/index.blade.php ENDPATH**/ ?>
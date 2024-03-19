<?php $__env->startSection('page_title', 'Students'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Students' => '',
    ];
    ?>
    <?php echo $__env->make('front.layouts.sub_header', [
        'title' => 'Students',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('front.lead_management.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Students</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('front.lead_management.students._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.add')): ?>
                    <a href="<?php echo e(route('create-student')); ?>" class="btn btn-dark me-3"><i
                            class="fas fa-plus fs-4 me-1"></i>
                        Create</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.import')): ?>
                        <?php echo $__env->make('front.lead_management.students.import._import', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            <?php if(isset($list) && count($list) > 0): ?>
                <button type="button"  class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#kt_modal_feedback" title="Click To View Feedback" alt="Click To View Feedback" id="sales_btn"> Assign to Sales User </button>
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed" id="custom-data-list">

                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="list-checkbox">
                                    <?php echo Form::checkbox('check_list',null,false,['class' => 'form-check-input']); ?>

                                </th>
                                <th class="min-w-125px">
                                    Date
                                </th>
                                <th class="min-w-125px">Vista ID</th>
                                <th>Sales User</th>
                                <th class="min-w-125px">
                                Platform
                                </th>
                                <th class="min-w-125px">
                                Mode
                                </th>
                                <th class="min-w-125px">
                                VCID
                                </th>
                                <th class="min-w-125px">
                                Country
                                </th>
                                <th class="min-w-125px">
                                    Student Details
                                </th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>


                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="list-checkbox skip-href">
                                        <?php echo Form::checkbox('selected_ids[]', $item->id,false,['class' => 'form-check-input check_list', 'disabled' => $item->salse_user_id == null ? false : true ]); ?>

                                    </td>
                                    <td>
                                        <?php 
                                        $date = date_create($item->lead_date);
                                        echo date_format($date,"d/m/Y");?> 
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('lead-vista-student', ['unique_id' => $item->unique_id])); ?>" class="menu-link px-3">
                                            <?php echo e($item->vista_id); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($item->sales_user->first_name ?? '-'); ?> <?php echo e($item->sales_user->last_name ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php if($item->platform_id != null): ?>
                                            <?php echo e($item->platform->title); ?> 
                                        <?php else: ?> 
                                            - 
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->mode_id != null): ?>
                                            <?php echo e($item->mode->title); ?> 
                                        <?php else: ?> 
                                            - 
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php echo e($item->campaign->original_campaign_id ?? '-'); ?> 
                                    </td>
                                    <td>
                                    <?php echo e($item->country->name ?? '-'); ?> 
                                    </td>
                                    <td>
                                        <?php echo e($item->name ?? '-'); ?> <br>
                                        <?php echo e($item->mobile_number ?? '-'); ?> <br>
                                        <?php echo e($item->email_id ?? '-'); ?>

                                    </td>
                                
                                    <td class="text-end">

                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                            data-kt-menu="true">

                                            <!-- <div class="menu-item px-3">
                                                <a href="<?php echo e(route('edit-student', ['unique_id' => $item->unique_id])); ?>"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-edit me-3"></i> Edit</a>
                                            </div> -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.delete')): ?>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('delete-student', ['unique_id' => $item->unique_id])); ?>"
                                                    data-token="<?php echo e(csrf_token()); ?>" class="menu-link px-3 delete-item-btn"
                                                    data-kt-users-table-filter="delete_row"><i
                                                        class="fas fa-trash me-3"></i>Delete</a>
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
                        <?php echo Form::open(['route' => ['update-sales-user'],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

							<div class="mb-13 text-center">
								<h1 class="mb-3">Choose Sales User</h1>
							</div>
							<div class="separator my-5"></div>
                            <div class="col-md-6 mb-5 position-relative select-2-field">
                                <label class="form-label fs-6 required">Sales User</label>
                                <?php echo Form::select('salse_user_id', $sales_user_list, null, [
                                    'class' => 'form-select',
                                    'id' => 'parent_salse_user_id',
                                    'required' => true,
                                    'data-control' => 'select2',
                                    'placeholder' => 'Please select Sales user',
                                    'data-parsley-errors-container' => '#sales-error',
                                ]); ?>

                                <div id="sales-error"></div>
                            </div>
							<button type="submit"  class="btn btn-primary mb-4"> Submit </button>
                        <?php echo form::close(); ?>

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
        $("#sales_btn").click(function(event){
            event.preventDefault();
            var searchIDs = $("#custom-data-list input:checkbox:checked").map(function(){
            return $(this).val();
            }).get(); // <----
            console.log(searchIDs);
            
            var dd = searchIDs.toString();
            console.log(dd);
            $('<input>').attr({ type: 'hidden', id: 'selected_ids', name: 'selected_ids'}).appendTo('form').val(dd);
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/index.blade.php ENDPATH**/ ?>
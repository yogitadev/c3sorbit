<?php $__env->startSection('page_title', 'Primary Confirmation'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Primary Confirmation' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Primary Confirmation',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.payment.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class=" row mb-5">
        <div class="col-md-6">

        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('primary_confirmation.add')): ?>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="<?php echo e(route('create-student-payment')); ?>" class="btn btn-primary">Add Primay Conformation</a>
            </div>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="messages"></div>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Primary Confirmation</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.payment.primary_confirmation._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            <?php if(isset($list) && count($list) > 0): ?>
            <div class="col-md-6">
                <p>
                    <b class="text-danger">Current Intake: <?php echo e($list[0]->student->student_application->intake->name); ?></b>
                </p>    
            </div>
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed" id="custom-data-list">
    
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-75px">
                                    Student Details
                                </th>
                                <th class="min-w-150px">
                                    Payment Details
                                </th>
                                <th class="min-w-125px">Approved</th>
                                <th class="min-w-125px">Outstanding</th>
                                <th class="min-w-200px">
                                    Status
                                </th>
                                <th class="min-w-150px">
                                    VL Aprv
                                </th>
                                <th class="min-w-150px">
                                    COL
                                </th>
                                <th class="min-w-150px">
                                    Action
                                </th>
                            </tr>
                        </thead>
    
    
                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php echo e($item->student->v_reference_no ?? '-'); ?> <br>
                                        <?php echo e($item->student->name ?? '-'); ?> <br>
                                        <?php echo e($item->student->programcode->program_name ?? '-'); ?> <br>
                                        <?php echo e($item->student->sales_user->first_name ?? '-'); ?> <?php echo e($item->student->sales_user->last_name ?? ' '); ?>

                                    </td>
                                    <td>
                                       First Year <br>
                                       <?php echo e($item->student->student_application->intake->name ?? '-'); ?> <br>
                                       <?php echo e($item->payment_id ?? '-'); ?> <br>
                                       &#8364;<?php echo e($item->amount ?? '-'); ?>

                                    </td>
                                    <td>
                                        <?php if($item->status == 'pending'): ?>
                                            &#8364;0     
                                        <?php else: ?>
                                            <?php 
                                                $total_approve = 0;
                                                $total_approve = $item->student_approve_payment->rf + $item->student_approve_payment->tf;
                                            ?>
                                            &#8364; <?php echo e($total_approve); ?>


                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->status == 'pending'): ?>
                                            &#8364;0     
                                        <?php else: ?>
                                            <?php 
                                                $pending = 0;
                                                $pending = $item->amount - $total_approve;
                                                if($pending < 0) {
                                                    $pending = 0;
                                                }
                                            ?>
                                            &#8364; <?php echo e($pending); ?> 
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->status == 'pending'): ?>
                                            <a href="<?php echo e(route('approve-student-payment',['id' => $item->id] )); ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-solid fa-check"></i> Pending
                                            </a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('primary_confirmation.delete')): ?>
                                                <a href="<?php echo e(route('delete-student-payment', ['unique_id' => $item->unique_id])); ?>"
                                                    data-token="<?php echo e(csrf_token()); ?>" class="btn btn-danger btn-sm delete-item-btn"
                                                    data-kt-users-table-filter="delete_row">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?> 
                                            <a href="<?php echo e(route('edit-approve-student-payment',['unique_id' => $item->student_approve_payment->unique_id] )); ?>" class="btn btn-success btn-sm">
                                                <i class="far fa-edit"></i> Approved
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->status == 'pending'): ?>
                                            N/A
                                        <?php else: ?>
                                            <button class=" btn-fill-md btn btn-success" title="Approved"><i class="fas fa fa-check"></i></button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->student_col_offer != null ): ?>
                                            <?php
                                            if($item->student_col_offer->media_id != null)
                                            $path = \Storage::url('uploads/media/offer_letter/'.$item->student_col_offer->media->original_file_name);
                                        
                                            ?>
                                            <?php if($item->student_col_offer->media_id != null) { ?>
                                                <a href="<?php echo e($path); ?>" target="_blank"><i class="fas fa-file-pdf text-primary" ></i> <?php echo e(date("d/m/Y", strtotime($item->student_col_offer->created_at)) ?? '-'); ?></a>
                                            <?php } else { ?>
                                                -
                                            <?php } ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                class="fas fa-angle-down ms-1"></i>
                                        </a>

                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('primary_confirmation.edit')): ?>
                                                <div class="menu-item px-3">
                                                    <a href="<?php echo e(route('edit-student-payment', ['unique_id' => $item->unique_id])); ?>"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-edit me-3"></i> Edit</a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('primary_confirmation.view')): ?>
                                                <div class="menu-item px-3">
                                                    <a href="<?php echo e(route('view-approve-student-payment', ['unique_id' => $item->unique_id])); ?>"
                                                        class="menu-link px-3 ">
                                                        <i class="fas fa-eye"></i> View</a>
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

        <?php if($list->hasPages()): ?>
            <div class="card-footer py-4">
                <div class="custom-pagination">
                    <?php echo $list->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/payment/primary_confirmation/student_index.blade.php ENDPATH**/ ?>
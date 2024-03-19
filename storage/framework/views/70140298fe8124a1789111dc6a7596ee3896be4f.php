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
            <p>
                <b>#OrbiTip2 : Primary Conformation can be added by Finance Department As well for any student whose OL is present.</b>
            </p>    
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
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed" id="custom-data-list">
    
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-75px">
                                    Status
                                </th>
                                <th class="min-w-150px">
                                    Student Number
                                </th>
                                <th class="min-w-125px">OutStanding</th>
                                <th class="min-w-125px">Approved</th>
                                <th class="min-w-150px">
                                    Name
                                </th>
                            </tr>
                        </thead>
    
    
                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if($item->vista_status_id == 13): ?>
                                            <a href="<?php echo e(route('student-id-payment-list',['lead_id' => $item->id] )); ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-solid fa-check"></i> Pending
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('student-id-payment-list',['lead_id' => $item->id] )); ?>" class="btn btn-success btn-sm">
                                                <i class="far fa-edit"></i> Approved
                                            </a>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <b><?php echo e($item->v_reference_no  ?? '-'); ?> </b> <br>
                                        First Year
                                    </td>
                                    <td>
                                        &#8364;<?php echo e($item->outstanding($item->id)); ?>

                                    </td>
                                    <td>
                                        &#8364;<?php echo e($item->approve($item->id)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->name ?? '-'); ?> <br>
                                        <?php echo e($item->sales_user->first_name ?? ''); ?> <?php echo e($item->sales_user->last_name ?? ''); ?> 
    
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

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/payment/primary_confirmation/index.blade.php ENDPATH**/ ?>
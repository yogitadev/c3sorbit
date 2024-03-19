<?php $__env->startSection('page_title', 'View Primary Confirmation'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Primary Confirmation' => route('student-payment-list'),
        'View' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'View Primary Confirmation',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.payment.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">View Primary Confirmation</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('student-id-payment-list', ['lead_id' => $item->student_id])); ?>" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <b><?php echo e($item->student->v_reference_no); ?> | <?php echo e($item->student->name); ?></b>
                </div>
                <div class="col-md-12 mb-5">
                    <b>Status : </b> <?php echo e($item->status); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Payment Type : </b> <?php echo e($item->payment_id); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Amount (&#8364;) : </b> <?php echo e($item->amount); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Payment Date : </b> <?php echo e($item->payment_date); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Registration Fees (RF) (&#8364;) : </b> <?php echo e($item->student_approve_payment->rf ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Sender Bank Charges (RFSBC) (&#8364;) : </b> <?php echo e($item->student_approve_payment->rfsbc ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Receiver Bank Charges(RFRBC) (&#8364;) : </b> <?php echo e($item->student_approve_payment->rfrbc ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Tuition Fees (TF) (&#8364;) : </b> <?php echo e($item->student_approve_payment->tf ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Sender Bank Charges (TFSBC) (&#8364;) : </b> <?php echo e($item->student_approve_payment->tfsbc ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Receiver Bank Charges(TFRBC) (&#8364;) : </b> <?php echo e($item->student_approve_payment->tfrbc ?? 0); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Others Charges (&#8364;) : </b> 0
                </div>
                <div class="col-md-12 mb-5">
                    <b>Visa Letter Amount (&#8364;) : </b>0
                </div>
                <div class="col-md-12 mb-5">
                    <b>Courier Charges (&#8364;) : </b> 0
                </div>
                <div class="col-md-12 mb-5">
                    <b>Remarks : </b> <?php echo e($item->student_approve_payment->notes_finance ?? '-'); ?>

                </div>
                <div class="col-md-12 mb-5">
                    <b>Notes : </b> <?php echo e($item->remarks ?? '-'); ?>

                </div>
            </div>
        </div>
    </div>

  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/payment/primary_confirmation/view.blade.php ENDPATH**/ ?>
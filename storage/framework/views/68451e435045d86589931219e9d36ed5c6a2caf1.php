<?php $__env->startSection('page_title', 'Reorder Interview Modes'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Interview Modes' => route('interview-mode-list'),
        'Reorder' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Reorder Interview Modes',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.cms.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Reorder Interview Modes</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('interview-mode-list')); ?>" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>

        <?php if(isset($list) && count($list) > 0): ?>
            <div class="card-body border-top p-9 custom_sortable">

                <ul class="list-group list-group-sortable">
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li id='<?php echo e($item->id); ?>' class="list-group-item">
                            <i class="fas fa-bars reorder-icon"></i><?php echo e($item->title); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="card-body border-top p-9">
                <h4 class="text-danger text-center">No Interview Mode Found</h4>
            </div>
        <?php endif; ?>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="btn-update-order" disabled>Update Order</button>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('themes/admin/third_party/sortable/jquery.sortable.min.js')); ?>"></script>

    <script type="text/javascript">
        $(function() {
            $items = [];
            $('.list-group-sortable').sortable({
                placeholderClass: 'list-group-item'
            }).bind('sortupdate', function(e, ui) {
                $('#btn-update-order').removeAttr('disabled');
                $.each(e.target.children, function(index, val) {
                    $items.push(val.id);
                })
            });
            $('#btn-update-order').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('reorder-interview-mode')); ?>',
                    data: {
                        'items': $items,
                        '_token': '<?php echo e(csrf_token()); ?>',
                    },
                    success: function(e) {
                        $items = [];
                        window.location.reload();
                    },
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/interview_modes/reorder.blade.php ENDPATH**/ ?>
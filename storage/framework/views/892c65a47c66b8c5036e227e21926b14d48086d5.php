<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"><?php echo e($title); ?>

            <!--begin::Separator-->
            <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <span class="text-muted fs-7 fw-bold mt-2"></span>
            <!--end::Description-->
            <?php if(isset($breadcrumb_arr)): ?>
                <?php if(!is_null($breadcrumb_arr) && count($breadcrumb_arr) > 0): ?>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 ms-2">
                        <li class="breadcrumb-item pe-3">
                            <a href="<?php echo e(route('admin-dashboard')); ?>" class="text-muted text-hover-primary">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <?php $__currentLoopData = $breadcrumb_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value == ''): ?>
                                <li class="breadcrumb-item pe-3 text-dark"><?php echo e($key); ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item text-muted">
                                    <a href="<?php echo e($value); ?>"
                                        class="text-muted text-hover-primary"><?php echo e($key); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if($loop->index < count($breadcrumb_arr) - 1): ?>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </h1>
        <!--end::Title-->
    </div>
    <!--end::Page title-->

</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/layouts/sub_header.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title', 'Students'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Students' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Students',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.person.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <?php echo $__env->make('admin.person.students._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>

        <div class="card-body py-4">

            <?php if(isset($list) && count($list) > 0): ?>
                <table class="table align-middle table-row-dashed" id="custom-data-list">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">Unique ID</th>
                            <th class="min-w-150px">
                                Name
                            </th>
                            <th class="min-w-125px">
                                V Reference Number
                            </th>
                            <th class="min-w-125px">Offer Letter</th>
                            <th class="min-w-125px">
                                Visa Letter
                            </th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 fw-bold">
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->unique_id); ?>

                                </td>
                                <td>
                                    <?php echo e($item->name ?? '-'); ?> 
                                </td>
                                <td>
                                   <?php echo e($item->v_reference_no ?? '-'); ?>

                                </td>
                                <td>
                                    <?php
                                        $path =  $item->studentCol($item->v_reference_no);
                                    
                                    ?>
                                    <a href="<?php echo e($path); ?>" target="_blank" class="btn btn-success btn-sm">COL</a> 
                                </td>
                                <td>
                                    <?php
                                        $path =  $item->studentVl($item->v_reference_no);
                                    
                                    ?>
                                    <a href="<?php echo e($path); ?>" target="_blank" class="btn btn-success btn-sm">VL</a>
                                </td>

                                <td class="text-end">

                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                            class="fas fa-angle-down ms-1"></i>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.view')): ?>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('view-student', ['unique_id' => $item->unique_id])); ?>"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-eye me-3"></i> View</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
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

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/person/students/index.blade.php ENDPATH**/ ?>
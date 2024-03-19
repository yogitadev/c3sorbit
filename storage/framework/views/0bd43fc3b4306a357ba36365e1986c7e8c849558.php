<?php $__env->startSection('page_title', 'Modules'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
        $breadcrumb_arr = [
            'IAM' => '',
            'Modules' => 'route(module-list)',
        ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Modules',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.iam.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="kt_app_content_container" class="app-container container-fluid">

        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">Modules</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?php echo $__env->make('admin.iam.modules._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <?php if(isset($list) && count($list) > 0): ?>
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed" id="custom-data-list">

                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">
                                        <?php echo \App\Helpers\Helper::getColumnSortLink([
                                            'url' => route('module-list'),
                                            'column_title' => 'Unique ID',
                                            'column_name' => 'unique_id',
                                            'params' => $params,
                                        ]); ?>

                                    </th>
                                    <th class="min-w-100px">Category</th>
                                    <th class="min-w-100px">
                                        <?php echo \App\Helpers\Helper::getColumnSortLink([
                                            'url' => route('module-list'),
                                            'column_title' => 'Title',
                                            'column_name' => 'title',
                                            'params' => $params,
                                        ]); ?>

                                    </th>
                                    <th class="min-w-100px"></th>
                                    <th class="text-end min-w-100px">Actions</th>


                                </tr>
                            </thead>


                            <tbody class="text-gray-600 fw-bold">
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->unique_id ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->category->title ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->title ?? ''); ?>

                                        </td>

                                        <td>
                                            <?php if($item->need_set_permissions == 'Yes'): ?>
                                                <span class="badge badge-danger mt-1">Need
                                                    to set permissions</span>
                                            <?php endif; ?>
                                        </td>



                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                    class="fas fa-angle-down ms-1"></i>
                                            </a>

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-200px py-4"
                                                data-kt-menu="true">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.set_permissions')): ?>
                                                    <div class="menu-item px-3">
                                                        <a href="<?php echo e(route('module-permission', ['unique_id' => $item->unique_id])); ?>"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-user-tag me-3"></i> Set Permission</a>
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
                        <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
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
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/iam/modules/index.blade.php ENDPATH**/ ?>
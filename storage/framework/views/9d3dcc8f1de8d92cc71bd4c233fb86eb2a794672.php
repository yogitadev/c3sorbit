<?php $__env->startSection('page_title', 'Roles'); ?>


<?php $__env->startSection('sub_header'); ?>
    <?php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => 'route(role-list)',
        ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Roles',
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
                    <h3 class="fw-bolder m-0">Roles</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?php echo $__env->make('admin.iam.roles._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
                            <a href="<?php echo e(route('reorder-role')); ?>" class="btn btn-warning me-3"><i
                                    class="fas fa-list fs-4 me-1"></i>
                                Reorder</a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.add')): ?>
                            <a href="<?php echo e(route('create-role')); ?>" class="btn btn-dark"><i class="fas fa-plus fs-4 me-1"></i>
                                Create</a>
                        <?php endif; ?>

                        <?php if(in_array(Auth::user()->email, ['milan@niupay.com.pg', 'ajay@niupay.com.pg'])): ?>
                            <a href="<?php echo e(route('role-re-assign')); ?>" class="btn btn-danger ms-3">
                                Role Re-Assign</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <?php if(isset($list) && count($list) > 0): ?>
                    <table class="table align-middle table-row-dashed" id="custom-data-list">

                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">
                                    <?php echo \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Unique ID',
                                        'column_name' => 'unique_id',
                                        'params' => $params,
                                    ]); ?>

                                </th>
                                <th class="min-w-100px">Division</th>
                                <th class="min-w-125px">
                                    <?php echo \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Name',
                                        'column_name' => 'name',
                                        'params' => $params,
                                    ]); ?>

                                </th>

                                <th class="min-w-125px">
                                    <?php echo \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Short Name',
                                        'column_name' => 'short_name',
                                        'params' => $params,
                                    ]); ?>

                                </th>

                                <th class="min-w-125px text-end">Users Count</th>

                                <th class="min-w-125px text-center">
                                    <?php echo \App\Helpers\Helper::getColumnSortLink([
                                        'url' => route('role-list'),
                                        'column_title' => 'Status',
                                        'column_name' => 'status',
                                        'params' => $params,
                                    ]); ?>

                                </th>
                                <?php if(\App\Helpers\Helper::hasAnyPermission('roles', ['view', 'edit', 'delete'])): ?>
                                    <th class="text-end min-w-100px">Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>


                        <tbody class="text-gray-600 fw-bold">
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($item->unique_id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->division->title ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->short_name); ?>

                                    </td>
                                    <td class="text-end">
                                        <?php echo e($item->users_count); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo \App\Helpers\Helper::showBadge($item->status); ?>

                                    </td>
                                    <?php if(\App\Helpers\Helper::hasAnyPermission('roles', ['view', 'edit', 'delete'])): ?>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                                    class="fas fa-angle-down ms-1"></i>
                                            </a>

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                                data-kt-menu="true">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                                                    <div class="menu-item px-3">
                                                        <a href="<?php echo e(route('view-role', ['unique_id' => $item->unique_id])); ?>"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-eye me-3"></i> View</a>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
                                                    <div class="menu-item px-3">
                                                        <a href="<?php echo e(route('edit-role', ['unique_id' => $item->unique_id])); ?>"
                                                            class="menu-link px-3">
                                                            <i class="fas fa-edit me-3"></i> Edit</a>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.delete')): ?>
                                                    <div class="menu-item px-3">
                                                        <a href="<?php echo e(route('delete-role', ['unique_id' => $item->unique_id])); ?>"
                                                            data-token="<?php echo e(csrf_token()); ?>"
                                                            class="menu-link px-3 delete-item-btn"
                                                            data-kt-users-table-filter="delete_row"><i
                                                                class="fas fa-trash me-3"></i>Delete</a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
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

<?php $__env->startPush('page_js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/roles/index.blade.php ENDPATH**/ ?>
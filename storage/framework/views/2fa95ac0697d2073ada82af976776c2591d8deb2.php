<?php $__env->startSection('page_title', 'Users'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Users' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Users',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.profession.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





    <div class="card">

        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h3 class="fw-bolder m-0">Users</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.profession.users._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <a href="<?php echo e(route('reorder-user')); ?>" class="btn btn-warning me-3"><i
                            class="fas fa-list fs-4 me-1"></i>
                        Reorder</a>
                    <a href="<?php echo e(route('create-user')); ?>" class="btn btn-dark"><i
                            class="fas fa-plus fs-4 me-1"></i>
                        Create</a>
                </div>
            </div>

        </div>





        <div class="card-body py-4">

            <?php if(isset($list) && count($list) > 0): ?>
                <table class="table align-middle table-row-dashed" id="custom-data-list">

                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">Unique ID</th>
                            <th class="min-w-125px">
                                <?php echo \App\Helpers\Helper::getColumnSortLink([
    'url' => route('user-list'),
    'column_title' => 'Email',
    'column_name' => 'email',
    'params' => $params,
]); ?>

                            </th>
                            <th class="min-w-125px">
                                <?php echo \App\Helpers\Helper::getColumnSortLink([
    'url' => route('user-list'),
    'column_title' => 'Username',
    'column_name' => 'username',
    'params' => $params,
]); ?>

                            </th>
                            <th class="min-w-125px">
                               Role
                            </th>
                            <th class="min-w-125px">
                                <?php echo \App\Helpers\Helper::getColumnSortLink([
    'url' => route('user-list'),
    'column_title' => 'Status',
    'column_name' => 'status',
    'params' => $params,
]); ?>

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
                                    <?php echo e($item->email); ?>

                                </td>
                                <td>
                                    <?php echo e($item->username); ?>

                                </td>
                                <td>
                                    <?php if(!is_null($item->role)): ?>
                                    <?php echo e($item->role->name); ?>

                                    <?php else: ?> -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo \App\Helpers\Helper::showBadge($item->status); ?>

                                </td>


                                <td class="text-end">

                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i
                                            class="fas fa-angle-down ms-1"></i>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fs-7 w-150px py-4"
                                        data-kt-menu="true">

                                        <div class="menu-item px-3">
                                            <a href="<?php echo e(route('edit-user', ['unique_id' => $item->unique_id])); ?>"
                                                class="menu-link px-3">
                                                <i class="fas fa-edit me-3"></i> Edit</a>
                                        </div>
                                        <?php if($item->admin_type == 'Admin'): ?>
                                        <div class="menu-item px-3">
                                            <a href="<?php echo e(route('delete-user', ['unique_id' => $item->unique_id])); ?>"
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

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/profession/users/index.blade.php ENDPATH**/ ?>
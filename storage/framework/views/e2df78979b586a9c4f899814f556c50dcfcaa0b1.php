<?php $__env->startSection('page_title', 'Faculties'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Faculties' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Faculties',
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
                <h3 class="fw-bolder m-0">Faculties</h3>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <?php echo $__env->make('admin.person.faculties._filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faculties.edit')): ?>
                        <a href="<?php echo e(route('reorder-faculty')); ?>" class="btn btn-warning me-3"><i
                            class="fas fa-list fs-4 me-1"></i>
                        Reorder</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faculties.add')): ?>
                        <a href="<?php echo e(route('create-faculty')); ?>" class="btn btn-dark"><i
                            class="fas fa-plus fs-4 me-1"></i>
                        Create</a>
                    <?php endif; ?>
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
                                Details
                            </th>
                            <th class="min-w-125px">Alternative Details</th>
                            <th class="min-w-125px">
                                <?php echo \App\Helpers\Helper::getColumnSortLink([
                                    'url' => route('faculty-list'),
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
                                    <?php echo e($item->first_name ?? '-'); ?> <?php echo e($item->last_name ?? ''); ?> <br>
                                    <b>Username:</b> <?php echo e($item->username ?? '-'); ?>

                                </td>
                                <td>
                                   <?php echo e($item->email ?? '-'); ?> <br>
                                    <?php echo e($item->mobile_number ?? '-'); ?>

                                </td>
                                <td>
                                    <?php echo e($item->altenative_email ?? '-'); ?> <br>
                                    <?php echo e($item->alternative_mobile_number ?? '-'); ?>

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
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faculties.view')): ?>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('view-faculty', ['unique_id' => $item->unique_id])); ?>"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-eye me-3"></i> View</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faculties.edit')): ?>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('edit-faculty', ['unique_id' => $item->unique_id])); ?>"
                                                    class="menu-link px-3">
                                                    <i class="fas fa-edit me-3"></i> Edit</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faculties.delete')): ?>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('delete-faculty', ['unique_id' => $item->unique_id])); ?>"
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

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/person/faculties/index.blade.php ENDPATH**/ ?>
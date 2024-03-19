<div class="card mb-5 mb-xl-8">
    <div class="card-body ">

        <div class="d-flex flex-stack fs-4 py-3">
            <h2>Role Information</h2>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit role detail">
                    <a href="<?php echo e(route('edit-role', ['unique_id' => $role_item->unique_id])); ?>"
                        class="btn btn-sm btn-light-primary">Edit</a>
                </span>
            <?php endif; ?>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div id="kt_customer_view_details" class="collapse show">
            <div class="fs-6">

                <div class="d-flex">
                    <div class="flex-grow-1 me-2 text-break text-wrap">
                        <div class="fw-bolder">Role ID</div>
                        <div class="text-gray-600"><?php echo e($role_item->unique_id ?? ''); ?></div>
                    </div>
                    <a href="javascript:;" class="fw-bolder py-1 text-muted align-self-center copy-btn"
                        data-clipboard-text="<?php echo e($role_item->unique_id ?? ''); ?>">
                        <i class="fas fa-copy fa-w-14 fs-3 dark"></i>
                    </a>
                </div>
                <div class="separator separator-dashed my-3"></div>
                <div class="d-flex">
                    <div class="flex-grow-1 me-2 text-break text-wrap">
                        <div class="fw-bolder">Role Name</div>
                        <div class="text-gray-600"><?php echo e($role_item->name ?? ''); ?></div>
                    </div>
                    <a href="javascript:;" class="fw-bolder py-1 text-muted align-self-center copy-btn"
                        data-clipboard-text="<?php echo e($role_item->name ?? ''); ?>">
                        <i class="fas fa-copy fa-w-14 fs-3 dark"></i>
                    </a>
                </div>
                <div class="separator separator-dashed my-3"></div>
                <div class="d-flex">
                    <div class="flex-grow-1 me-2 text-break text-wrap">
                        <div class="fw-bolder">Role Short Name</div>
                        <div class="text-gray-600"><?php echo e($role_item->short_name ?? ''); ?></div>
                    </div>
                    <a href="javascript:;" class="fw-bolder py-1 text-muted align-self-center copy-btn"
                        data-clipboard-text="<?php echo e($role_item->short_name ?? ''); ?>">
                        <i class="fas fa-copy fa-w-14 fs-3 dark"></i>
                    </a>
                </div>
                <div class="separator separator-dashed my-3"></div>
                <div class="d-flex">
                    <div class="flex-grow-1 me-2 text-break text-wrap">
                        <div class="fw-bolder">Division</div>
                        <div class="text-gray-600"><?php echo e($role_item->division->title ?? ''); ?></div>
                    </div>
                    <a href="javascript:;" class="fw-bolder py-1 text-muted align-self-center copy-btn"
                        data-clipboard-text="<?php echo e($role_item->division->title ?? ''); ?>">
                        <i class="fas fa-copy fa-w-14 fs-3 dark"></i>
                    </a>
                </div>
                <div class="separator separator-dashed my-3"></div>
                <div class="d-flex">
                    <div class="flex-grow-1 me-2 text-break text-wrap">
                        <div class="fw-bolder">Status</div>
                        <div class="text-gray-600">
                            <?php echo \App\Helpers\Helper::showBadge($role_item->status); ?></div>
                    </div>
                    <a href="javascript:;" class="fw-bolder py-1 text-muted align-self-center copy-btn"
                        data-clipboard-text="<?php echo e($role_item->status ?? ''); ?>">
                        <i class="fas fa-copy fa-w-14 fs-3 dark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/roles/show/includes/_information.blade.php ENDPATH**/ ?>
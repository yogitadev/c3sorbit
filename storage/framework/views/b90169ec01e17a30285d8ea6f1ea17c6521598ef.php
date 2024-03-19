<button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    <i class="fas fa-filter fs-4 me-1"></i>
    Filter
</button>



<div class="menu menu-sub menu-sub-dropdown " data-kt-menu="true">

    <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
    </div>

    <div class="separator border-gray-200"></div>

    <?php echo Form::open(['method' => 'get']); ?>

    <div class="px-7 py-5">

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Search:</label>
            <?php echo Form::text('search', $params['search'] ?? null, ['class' => 'form-control']); ?>

        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Status:</label>

            <?php echo Form::select('search_status', ['' => '', 'Active' => 'Active', 'Inactive' => 'Inactive'], $params['search_status'] ?? null, [
    'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
    'data-kt-select2' => 'true',
    'data-placeholder' => 'Select option',
    'data-allow-clear' => 'true',
    'data-hide-search' => 'true',
]); ?>


        </div>


        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Per Page:</label>

            <?php echo Form::select('per_page', ['' => '', '10' => '10', '20' => '20', '50' => '50', '100' => '100', '500' => '500'], $params['per_page'] ?? 20, [
    'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
    'data-kt-select2' => 'true',
    'data-placeholder' => 'Select option',
    'data-allow-clear' => 'true',
    'data-hide-search' => 'true',
]); ?>


        </div>
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('attachment-type-list')); ?>"
                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6">Reset</a>
            <button type="submit" class="btn btn-primary fw-bold px-6">Apply</button>
        </div>

    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/vista_update_management/attachment_types/_filter.blade.php ENDPATH**/ ?>
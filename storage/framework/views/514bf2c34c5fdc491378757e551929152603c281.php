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

    <div class="scroll-y mh-325px px-7 py-5">

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Start Date:</label>
            <?php echo Form::date('start_date', $params['start_date'] ?? null, ['class' => 'form-control']); ?>

        </div>
        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">End Date:</label>
            <?php echo Form::date('end_date', $params['end_date'] ?? null, ['class' => 'form-control']); ?>

        </div>
        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Program:</label>

            <?php echo Form::select('programcode_id', $program_list, $params['programcode_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'placeholder' => 'Please select program',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]); ?>


        </div>
        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Country:</label>

            <?php echo Form::select('country_id', $country_list, $params['country_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'placeholder' => 'Please select country',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]); ?>


        </div>
        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Platform:</label>

            <?php echo Form::select('platform_id', $platform_list, $params['platform_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'placeholder' => 'Please select platform',
                'id' => 'parent_platform_id',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]); ?>


        </div>
        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Mode:</label>

            <?php echo Form::select('mode_id', $mode_list, $params['mode_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'placeholder' => 'Please select mode',
                'id' => 'parent_mode_id',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]); ?>


        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Search:</label>
            <?php echo Form::text('search', $params['search'] ?? null, ['class' => 'form-control','placeholder' => 'Name,Phone,Email']); ?>

        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">VCID:</label>

            <?php echo Form::select('campaign_id', $campaign_list, $params['campaign_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'placeholder' => 'Please select campaign',
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
            <a href="<?php echo e(route('student-list')); ?>"
                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6">Reset</a>
            <button type="submit" class="btn btn-primary fw-bold px-6">Apply</button>
        </div>

    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/_filter.blade.php ENDPATH**/ ?>
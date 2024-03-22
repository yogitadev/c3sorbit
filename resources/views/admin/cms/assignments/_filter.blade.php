<button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    <i class="fas fa-filter fs-4 me-1"></i>
    Filter
</button>



<div class="menu menu-sub menu-sub-dropdown " data-kt-menu="true">

    <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
    </div>

    <div class="separator border-gray-200"></div>

    {!! Form::open(['method' => 'get']) !!}
    <div class="scroll-y mh-325px px-7 py-5">

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Search:</label>
            {!! Form::text('search', $params['search'] ?? null, ['class' => 'form-control']) !!}
        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Subject:</label>

            {!! Form::select('subject_id', $subject_list, $params['subject_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]) !!}

        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Faculty:</label>

            {!! Form::select('faculty_id', $faculty_list, $params['faculty_id'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]) !!}

        </div>

        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Status:</label>

            {!! Form::select('search_status', ['' => '', 'Active' => 'Active', 'Inactive' => 'Inactive'], $params['search_status'] ?? null, [
                'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
                'data-kt-select2' => 'true',
                'data-placeholder' => 'Select option',
                'data-allow-clear' => 'true',
                'data-hide-search' => 'true',
            ]) !!}

        </div>


        <div class="mb-5">
            <label class="form-label fs-6 fw-bold">Per Page:</label>

            {!! Form::select('per_page', ['' => '', '10' => '10', '20' => '20', '50' => '50', '100' => '100', '500' => '500'], $params['per_page'] ?? 20, [
    'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible',
    'data-kt-select2' => 'true',
    'data-placeholder' => 'Select option',
    'data-allow-clear' => 'true',
    'data-hide-search' => 'true',
]) !!}

        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('assignment-list') }}"
                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6">Reset</a>
            <button type="submit" class="btn btn-primary fw-bold px-6">Apply</button>
        </div>

    </div>
    {!! Form::close() !!}
</div>

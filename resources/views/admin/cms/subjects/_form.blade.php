<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Select Course</label>
        {!! Form::select('programcode_id', $program_list, null, [
            'class' => 'form-select',
            'id' => 'parent_programcode_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Course',
            'data-parsley-errors-container' => '#course-error',
        ]) !!}
        <div id="course-error"></div>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Select Faculty</label>
        {!! Form::select('faculty_id', $faculty_list, null, [
            'class' => 'form-select',
            'id' => 'parent_faculty_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Faculty',
            'data-parsley-errors-container' => '#faculty-error',
        ]) !!}
        <div id="faculty-error"></div>
    </div>
</div>
<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]) !!}
    </div>
</div>
@push('page_js')
@endpush

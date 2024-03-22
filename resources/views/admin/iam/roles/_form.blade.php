<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true,'data-parsley-maxlength' => 254,'maxlength'=>254]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Short Name</label>
        {!! Form::text('short_name', null, ['class' => 'form-control', 'required' => true,'data-parsley-maxlength' => 254,'maxlength'=>254]) !!}
    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Status</label>
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]) !!}
    </div>
</div>


@push('page_js')
@endpush

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">ShortName</label>
        {!! Form::text('shortname', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">PhoneCode</label>
        {!! Form::text('phonecode', null, ['class' => 'form-control', 'required' => true]) !!}
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

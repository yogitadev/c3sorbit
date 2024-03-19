<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">First Name</label>
        {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Last Name </label>
        {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Gender </label>
        <div class="form-check form-check-inline">
            {!! Form ::radio('gender','Male',true,['class' => 'form-check-input']) !!}
            <label class="form-check-label" for="Male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            {!! Form ::radio('gender','Female',false,['class' => 'form-check-input']) !!}
            <label class="form-check-label" for="Female">Female</label>
        </div>
        <div class="form-check form-check-inline">
            {!! Form ::radio('gender','Not Prefer',false,['class' => 'form-check-input']) !!}
            <label class="form-check-label" for="Not Prefer">Not Prefer</label>
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Date of Birth</label>
            {!! Form::date('dob', null, ['class' => 'form-control','required' => 'true']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email</label>
            {!! Form::text('email', null, ['class' => 'form-control','required' => 'true']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Mobile No.</label>
            {!! Form::text('mobile_number', null, ['class' => 'form-control','required' => 'true']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label  fs-6">Alternative Email</label>
            {!! Form::text('altenative_email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Alternative Mobile No.</label>
            {!! Form::text('alternative_mobile_number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">User Name</label>
        {!! Form::text('username', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true, 'readonly' => isset($item) && !is_null($item->username) ? true : false]) !!}
    </div>
    @if(!isset($item))
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Password</label>
        {!! Form::text('password', null , ['class' => 'form-control', 'required' => true]) !!}
    </div>
    @endif
</div>

<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Profile Picture</label>
        {!! Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf']) !!}

        @if (isset($item) && !is_null($item) && !is_null($item->media))
                @if($item->media->file_extension == 'pdf')
                    <a href="{{ $item->media->getUrl() }}" target="_blank">
                        Click to view
                    </a>
                @else
                    <div class="thumb mt-5">
                        <a data-fancybox href="{{ $item->media->getUrl() }}">
                            <img src="{{ $item->media->fitThumbUrl() }}" class="img-thumbnail" class="clearfix" />
                        </a>
                    </div>
                @endif
        @endif

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
<script type="text/javascript">
    $(function() {
       
    });
</script>
@endpush

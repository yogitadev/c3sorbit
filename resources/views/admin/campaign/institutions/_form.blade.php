<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email</label>
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Mobile Number</label>
        {!! Form::text('mobile_number', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Website Url</label>
        {!! Form::text('website_url', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Logo</label>
        {!! Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf','required' => isset($item) && !is_null($item->media) ? false : true ]) !!}

        @if (isset($item) && !is_null($item) && !is_null($item->media))
            <div class="thumb">
                <a data-fancybox href="{{ $item->media->getUrl() }}">
                    <img src="{{ $item->media->fitThumbUrl() }}" class="img-thumbnail" class="clearfix" />
                </a>
            </div>
        @endif

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Facebook Url</label>
        {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Instagram Url</label>
        {!! Form::text('instagram_url', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Linkedin Url</label>
        {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Youtube Url</label>
        {!! Form::text('youtube_url', null, ['class' => 'form-control']) !!}
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

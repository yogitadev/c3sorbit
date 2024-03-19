<div class="separator my-5"></div>
<h3 class="mb-5">Personal Details : </h3>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">First Name</label>
        {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Last Name</label>
        {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Contact Details :</h3>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Email Address</label>
        {!! Form::text('email', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true,'readonly' => isset($item) && !is_null($item->email) ? true : false]) !!}
    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
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



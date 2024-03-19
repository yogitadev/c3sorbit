@extends('mail.admin.layouts.layout')
@section('content') 

Hello, <br>
    
Trouble signing in? <br>

Resetting your password is easy. <br>

Just press the button below and follow the instructions. We’ll have you up and running in no time. <br>
    <a href="{{ $password_setup_link }}" class="btn btn-primary">Reset Password</a> <br>

If you did not make this request then please ignore this email.
@endsection
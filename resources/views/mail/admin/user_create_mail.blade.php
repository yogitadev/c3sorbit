@extends('mail.admin.layouts.layout')
@section('content') 

Hello, {{ $data['first_name']}} {{ $data['last_name'] }}<br>
    You Successfully Register Your Id in Edfyed. <br>
    Your username & password mention below <br>
    <b>Username: </b> {{ $data['username'] }} <br>
    <b>Password: </b> {{ $password }}
@endsection
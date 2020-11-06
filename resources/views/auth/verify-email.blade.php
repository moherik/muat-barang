@extends('layouts.auth')

@section('title')
Verify Email
@stop

@section('content')
<form action="/email/verification-notification" method="post">
    @csrf

    <input type="email" name="email" value="{{old('email')}}">
    @if($errors->has('email'))
    {{$errors->first('email')}}
    @endif

    <button type="submit">Send Verification Email</button>
</form>
@stop
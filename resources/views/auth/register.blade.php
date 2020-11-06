@extends('layouts.auth')

@section('title')
Register
@stop

@section('content')
<form action="/register" method="post">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" value="{{old('email')}}" />
    @if($errors->has('email'))
    {{$errors->first('email')}}
    @endif

    <label for="username">Username</label>
    <input type="text" name="username" value="{{old('username')}}" />
    @if($errors->has('username'))
    {{$errors->first('username')}}
    @endif

    <label for="password">Password</label>
    <input type="password" name="password" />
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif

    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" name="password_confirmation" />
    @if($errors->has('password_confirmation'))
    {{$errors->first('password_confirmation')}}
    @endif

    <button type="submit" name="resister">Register</button>
</form>
@stop
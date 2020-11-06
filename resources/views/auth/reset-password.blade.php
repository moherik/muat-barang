@extends('layouts.auth')

@section('title')
Reset Password
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Reset Password</h4>
    </div>

    <div class="card-body">
        <form action="/reset-password" method="post">
            @csrf

            <input type="hidden" name="token" value="{{$request->route('token')}}">

            <div class="form-group">
                <input type="email" name="email" class="form-control" readonly required value="{{$request->email}}">
                @if($errors->has('email'))
                <div class="form-text text-danger">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" autofocus required tabindex="1" placeholder="Your new password">
                @if($errors->has('password'))
                <div class="form-text text-danger">
                    {{$errors->first('password')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" required tabindex="2" placeholder="Your new password confirmation">
                @if($errors->has('password_confirmation'))
                <div class="form-text text-danger">
                    {{$errors->first('password_confirmation')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@stop
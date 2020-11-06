@extends('layouts.auth')

@section('title')
Send Reset Password Link
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Forgot Password</h4>
    </div>

    <div class="card-body">
        <p class="text-muted">We will send a link to reset your password</p>
        <form action="/forgot-password" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="{{old('email')}}">
                @if($errors->has('email'))
                <div class="form-text text-danger">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="2">
                    Send Reset Password Link
                </button>
            </div>

            <div class="text-center">
                <a href="/login" class="text-small" tabindex="3">
                    Back to Login
                </a>
            </div>
        </form>
    </div>
</div>
@stop
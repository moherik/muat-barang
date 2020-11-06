@extends('layouts.auth')

@section('title')
Login
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required autofocus value="{{old('username')}}" tabindex="1" />
                @if($errors->has('username'))
                <div class="form-text text-danger">
                    {{$errors->first('username')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                        <a href="/forgot-password" class="text-small" tabindex="3">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <input type="password" name="password" class="form-control" required tabindex="2" />
                @if($errors->has('password'))
                <div class="form-text text-danger">
                    {{$errors->first('password')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                    <span class="iconify" data-icon="mdi-arrow-right" data-inline="false"></span>
                </button>
            </div>
        </form>
    </div>
</div>
@stop
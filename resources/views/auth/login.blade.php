@extends('layouts.library')

@section('content')
<div class="cd-user-modal-container">
    <div class="row">
        <h2 style="text-align: center;">Login Account</h2>
        <div id="cd-login" class="is-selected"> 
            <form class="cd-form" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signin-username">Username</label>
                        <input class="full-width has-padding has-border" id="signin-username" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                    </p>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" type="password" id="signin-password" type="text"  placeholder="Password" name="password" required>
                        <a href="" class="hide-password">Show</a>
                        @if ($errors->has('password'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </p>
                </div>
                <div class="form-group">
                    <p class="fieldset">
                        <input type="checkbox" id="remember-me" name="remember" checked>
                        <label for="remember-me">Remember me</label>
                        <a href="{{ url('/password/reset') }}" class="pull-right">Forgot your password?</a>
                    </p>
                </div>
                <p class="fieldset">
                    <input class="full-width" type="submit" value="Login">
                </p>
            </form>
            <p class="cd-form-bottom-message">
                <a href="{{ url('/register') }}">Don't have an account? Register New Account</a>
            </p>
        </div> <!-- cd-login -->
    </div>
</div>
@endsection

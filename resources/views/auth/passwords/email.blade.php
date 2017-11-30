@extends('layouts.library')

@section('content')
<div class="cd-user-modal-container">
    <div class="row">
        <h2 style="text-align: center;">Forgot Password</h2>
        <div id="cd-reset-password" class="is-selected"> 
            <p class="cd-form-message">Forgot your password? Please enter your email address.<br> You will receive a link to create a new password.</p>
            @if (session('status'))
                <div class="alert alert-success" style="background:#00b300; border-color:#009900;"">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('email'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('email') }}
                </div>
            @endif
            <form class="cd-form" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </p>
                </div>
                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Send Password Reset Link">
                </p>
            </form>
            <p class="cd-form-bottom-message">
                <a href="{{ url('/login') }}">Back to login</a>
            </p>
        </div> <!-- cd-reset-password -->
    </div> <!-- cd-user-modal-container -->
</div>
@endsection
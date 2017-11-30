@extends('layouts.library')

@section('content')
<div class="cd-user-modal-container">
    <div class="row">
        <h2 style="text-align: center;">Reset Password</h2>
        @if (Session::has('success'))
        <div style="background-color:#9999FF">
            <div class="container">        
                <div class="alert alert-success" style="background:#00b300; border-color:#009900; margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}</div>
            </div>
        </div>
        @endif
        <div id="cd-reset" class="is-selected">
            <form class="cd-form" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email" value="{{ $email or old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </p>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" type="password" id="signup-password" type="text"  placeholder="Password" name="password" required minlength=6>
                        <a href="" class="hide-password">Show</a>
                        @if ($errors->has('password'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </p>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password-confirm">Password</label>
                        <input class="full-width has-padding has-border" type="password" id="signup-password-confirm" type="text" placeholder="Confirm Password" name="password_confirmation" required>
                        <a href="" class="hide-password">Show</a>
                        @if ($errors->has('password_confirmation'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                        @endif
                    </p>
                </div>
                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Reset password">
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

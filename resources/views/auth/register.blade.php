@extends('layouts.library')

@section('content')
<div class="cd-user-modal-container">
    <div class="row">
        <h2 style="text-align: center;">Register New Account</h2>
        <div id="cd-signup" class="is-selected">
            <form class="cd-form" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                            <span class="cd-error-message is-visible"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                    </p>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
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
                    <label class="image-replace cd-membership" for="signup-membership">Membership</label>
                    <select class="full-width has-padding has-border" id="signup-membership" name="membership_id" onchange="updateTC();">
                        @foreach ($memberships as $membership)
                            <option value={{ $membership->id }} {{ $membership->id == $selected_id ? 'selected' : '' }}>
                                {{ $membership->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="display-info">Membership</span>
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="accept-terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you have read and accepted the Terms and Conditions' : '');" required>
                    <label for="accept-terms">I agree to the <a id="tcMembership" href="" style="color:blue" data-toggle="modal" data-target="{{ $selected_id == 2 ? '#partyhireModal' : '#annualModal' }}">Terms and Conditions</a></label>
                </p>
                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Create account">
                </p>
            </form>
            <p class="cd-form-bottom-message">
                <a href="{{ url('/login') }}">Already a member? Login Account</a>
            </p>
        </div> <!-- cd-signup -->
    </div>
</div>
@include('termsandconditions.annual')
@include('termsandconditions.partyhire')
@endsection

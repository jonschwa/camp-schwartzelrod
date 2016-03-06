@extends("layout")
@section("content")
<div id="password-reset-container" class="container-fluid">
    @if (count($errors) > 0)
        <div id="error-flash-container" class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span id="error-flash-message" class="alert-error-text">{{ $error }}</span>
                </div>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="clarendon-headline green">Password Reset</div>
            <p class="highway-subhead">You're well on the road to password recovery!</p>
            <p>Please set your new password. Maybe one you will actually remember this time?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="/password/reset">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control input" id="email" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input class="form-control input" id="password" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input class="form-control input" id="password_confirmation" type="password" name="password_confirmation">
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
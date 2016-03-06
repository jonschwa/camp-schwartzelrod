@extends("layout")
@section("content")
    <div id="password-reset-container" class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-check aria-hidden="true"></span>
                <span class="success">{{ session('status') }}</span>
            </div>
        @endif
        @if (count($errors) > 0)
        <div id="error-flash-container" class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <div>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <span id="error-flash-message" class="alert-error-text">{{ $error }}</span>
            </div>
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="clarendon-headline green">Password Reset</div>
                <p class="highway-subhead">Don't worry - it happens to the best of us!</p>
                <p>If you are having trouble logging in, please enter your email and we will email you a password reset link.</p>
                <p>The code will be valid for 1 hour. How convenient!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/password/email">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="text" class="form-control input" id="form-login-email" name="email" placeholder="Enter your email">
                    </div>
                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </div>
@stop
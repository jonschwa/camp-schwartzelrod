@extends("layout")

@section("content")
    <div class="container-fluid" id="login-container">
        <div class="row">
            <div class="col-md-12">
                <div id="error-flash-container" class="alert alert-danger txt-centered" role="alert" style="display:none">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span id="error-flash-message" class="alert-error-text"></span>
                </div>
                <div class="clarendon-headline green txt-centered">Log In</div>
                @include("users._login-form")
                <div class="login-help">
                    <p class="highway-subhead centered">
                        Having trouble logging in?
                    </p>
                    <p>Click <a href="/password/recover">here</a> to reset your password.</p>
                    <p>Still having trouble? <a href="mailto:schwartzelrods@gmail.com">Contact us</a>.</p>
                </div>
            </div>
        </div>
    </div>
@stop


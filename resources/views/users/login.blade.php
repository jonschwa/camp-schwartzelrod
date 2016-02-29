@extends("layout")

@section("content")
    <div class="container-fluid">
        <div id="error-flash-container" class="alert alert-danger txt-centered" role="alert" style="display:none">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span id="error-flash-message" class="alert-error-text"></span>
        </div>
        <div class="clarendon-headline green txt-centered">Log In</div>
        @include("users._login-form")
    </div>
@stop


<a name="rsvp"></a>
<div class="container-fluid" id="rsvp-section">
    <div id="error-flash-container" class="alert alert-danger container" role="alert" style="display:none">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span id="error-flash-message" class="alert-error-text"></span>
    </div>
    <div class="row">
        <div id="code-response-form-container">
            <p class="clarendon-headline">RSVP</p>
            @include("rsvp._form-enter-code")
            @include("rsvp._form-register")
            @include("rsvp._form-maybe")
            @include("rsvp._form-decline")
            @include('rsvp._response-forms')
            <p><a href="/test_invites">Invitation codes</a></p>
        </div>
    </div>
</div>
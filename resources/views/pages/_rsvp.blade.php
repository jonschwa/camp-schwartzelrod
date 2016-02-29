<a name="rsvp"></a>
<div id="rsvp-border"></div>
<div class="container-fluid" id="rsvp-section">
    <div id="error-flash-container" class="alert alert-danger" role="alert" style="display:none">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span id="error-flash-message" class="alert-error-text"></span>
    </div>
    <div class="row">
        <div id="code-response-form-container">
            <div class="container-fluid">
                <div class="col-md-8">
                    <p class="clarendon-headline" id="rsvp-section-title">RSVP</p>
                    @include("rsvp._form-enter-code")
                    @include("rsvp._form-register")
                    @include("rsvp._form-maybe")
                    @include("rsvp._form-decline")
                    @include("rsvp._form-opt-out")
                    @include('rsvp._response-forms')
                    <p><a href="/test_invites">Invitation codes</a></p>
                </div>
                <div class="col-md-4">
                    <img class="img-save-the-date" src="/img/std-card-help.png" />
                </div>
            </div>
        </div>
    </div>
</div>
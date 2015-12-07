@extends("layout")

@section("content")
    <div class="container-fluid">
        <div id="rsvp-form-container">
            <div class="inner-container">
            <p class="title">Camp Schwartzelrod</p>
                @include("rsvp._form-enter-code")
                @include("rsvp._form-register")
                @include("rsvp._form-maybe")
                @include("rsvp._form-decline")
            </div>
        </div>
    </div>
@stop


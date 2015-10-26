@extends("layout")

@section("content")
    <div class="container">
        @include("rsvp._form-enter-code")
        @include("rsvp._form-register")
        @include("rsvp._form-decline")
    </div>
@stop


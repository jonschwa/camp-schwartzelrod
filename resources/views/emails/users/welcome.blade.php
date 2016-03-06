@extends("email-layout")
@section("content")
    <h2>Hi, {{ $user->first_name }}!</h2>
    <p>
        We are so excited that you’ll be joining us for our wedding and camp weekend in Vermont.
        You are now registered at camp.schwartzelrods.com. Don’t forget to <a href="{{ URL::to('/#rsvp') }}">submit your RSVP</a> by August 1st!
    </p>
    <p>
        Join our <a href="https://www.facebook.com/groups/922948407781596/">Camp Schwartzelrod group on Facebook</a> to meet, mingle, and coordinate with other guests!
    </p>
    <p>
        Questions? Just reply to this email.
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
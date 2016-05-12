@extends("email-layout")
@section("content")
    <h2>Hi, {{ $user->first_name }}!</h2>
    <p>
        This is a friendly reminder to come check out <a href="{{ URL::to('/')}}">our wedding site</a> and let us know if
        you can make it to the wedding! We know things sometimes get lost in the mail, animals eat invitations, etc so
        here is your invitation code in case you need it:
    </p>
    <p style="font-size: 2em; text-align: center; font-weight: bold;">
        {{ $user->invitation->code }}
    </p>
    <p>
        Please enter your code <a href="{{ URL::to('/?code=' . $user->invitation->code) }}#rsvp">here</a> to RSVP.
        Even if your aren't entirely sure yet, please RSVP "maybe" and let us know; It will help us out a lot with the
        planning. We hope you can come, but if you know for sure that you can't, the earlier you can let us know, the better.
    </p>
    <p>
        Thank you! If you have any questions you can just reply to this email.
        ...or you can call us! We must be pretty tight - you're invited to our wedding!
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
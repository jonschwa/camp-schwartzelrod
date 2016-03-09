@extends("email-layout")
@section("content")
    <h2>Hey {{ $user->first_name }},</h2>
    <p>
        Thank you for RSVPing! We can’t wait to celebrate with you!
    </p>
    <p>
        You have successfully RSVPed YES for {{$user->guests->count()}} @if($user->guests->count() == 1) guest: @else guests: @endif
    </p>
    <div>
        @foreach($user->guests as $guest)
        <p><strong>{{$guest->first_name}} {{$guest->last_name}}</strong></p>
        @endforeach
    </div>
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" width="200" height="40" bgcolor="#087649" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ecc884; display: block;">
                <a href="{{ URL::to('/rsvp') }}" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">Update RSVP</span></a>
            </td>
        </tr>
    </table>
    <p>
        Keep an eye on your email for future communication from us. We’ll be sending out more information, cabin registration invitations, hotel info, and more over the next few months.
    </p>
    <p>
        Join our <a href="https://www.facebook.com/groups/922948407781596/">Camp Schwartzelrod group on Facebook</a> to meet, mingle, and coordinate with other guests!
    </p>
    <p>
        Questions? Just reply to this email.
    </p>
    <p>
        Thanks, <br />
        Jon & Stacey
    </p>
@stop
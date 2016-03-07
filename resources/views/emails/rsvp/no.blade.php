@extends("email-layout")
@section("content")
    <h2>Hey {{ $user->first_name }},</h2>
    <p>
        That’s a bummer, but we understand. We will miss you! If you change your mind,
        feel free to make changes until August 1st.
    </p>
    <p>
        A quick note for future-you - your rsvp code is <strong>{{ $user->invitation->code }}</strong>.
        Just enter that code in again if things change.
    </p>
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" width="200" height="40" bgcolor="#087649" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ecc884; display: block;">
                <a href="{{ URL::to('/?code=' . $user->invitation->code) }}#rsvp" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">Update RSVP</span></a>
            </td>
        </tr>
    </table>
    <p>
        Questions? Just reply to this email.
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
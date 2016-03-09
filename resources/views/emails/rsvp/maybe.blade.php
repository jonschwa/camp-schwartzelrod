@extends("email-layout")
@section("content")
    <h2>Hey {{ $user->first_name }},</h2>
    <p>
        We really hope you can make it! Please let us know by August 1st.
    </p>
    <p>
        A quick note for future-you: Your RSVP code is <strong>{{ $user->invitation->code }}</strong>.
        Just visit <a href="{{ URL::to('/?code=' . $user->invitation->code) }}#rsvp">camp.schwartzelrods.com</a> and enter that code again if you want to change your RSVP.
    </p>
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" width="200" height="40" bgcolor="#087649" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ecc884; display: block;">
                <a href="{{ URL::to('/?code=' . $user->invitation->code) }}#rsvp" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">Update RSVP</span></a>
            </td>
        </tr>
    </table>
    <p>
        Maybe joining our <a href="https://www.facebook.com/groups/922948407781596/">Camp Schwartzelrod group on Facebook</a> will help sway your decision?
    </p>
    <p>
        Questions? Just reply to this email.
    </p>
    <p>
        Thanks,>br />
        Jon & Stacey
    </p>
@stop
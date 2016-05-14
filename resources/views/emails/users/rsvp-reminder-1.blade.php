@extends("email-layout")
@section("content")
    <h2>Hi, {{ $user->first_name }}!</h2>
    <p>
        This is a friendly reminder to let us know if you can make it to our wedding! You can get all the details at
        <a href="{{ URL::to('/')}}">camp.schwartzelrods.com</a> or click this big green button to jump straight to the
        action:
    </p>
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" width="200" height="40" bgcolor="#087649" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ecc884; display: block;">
                <a href="{{ URL::to('/?code=' . $user->invitation->code) }}#rsvp" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">RSVP</span></a>
            </td>
        </tr>
    </table>
    <p>
        Forgot your RSVP code? Invitation lost in the mail? Dog ate it? Well you're in luck! Your code is
        <strong>"{{ $user->invitation->code }}"</strong>.
    </p>
    <p>
        Even if your aren't entirely sure yet, please RSVP maybe. It will help us out a lot with the planning.
        You can always return to the site, log in, and change your RSVP later. Please let us know your final
        decision by August 1st.
    </p>
    <p>
        Questions? Just reply to this email.
    </p>
    <p>
        Thank you!
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
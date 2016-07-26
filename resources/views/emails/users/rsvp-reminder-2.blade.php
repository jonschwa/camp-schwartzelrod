@extends("email-layout")
@section("content")
    <h2>Hi, {{ $user->first_name }}!</h2>
    <p>
        Last chance to let us know if you can make it to our wedding! You can get all the details at
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
        <strong>Wondering where to stay?</strong> Most of our guests will be staying at the two inns on the island,
        <a href="http://www.shoreacres.com/">Shore Acres Inn</a> and <a href="http://www.northherohouse.com/">North Hero House</a>.
        We also still have room in the camp cabins and lots of people will be bringing their own tents! No matter
        where you stay, you’re welcome to hang out at the camp and enjoy the activities we have planned on Friday,
        Saturday, and Sunday.
    </p>
    <p>
        Questions? Just reply to this email, or feel free to call us (Stacey: 908-420-4006, Jon: 908-421-6493).
    </p>
    <p>
        Thank you!
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
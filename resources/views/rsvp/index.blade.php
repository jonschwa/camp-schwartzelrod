@extends("layout")

@section("content")
<div class="container-fluid" id="registration-info">
    <p class="clarendon-headline">Welcome to Camp Schwartzelrod!</p>
    <div class="content">
        <p>
            As you have doubtlessly figured out by now, we will be using this website to provide information about our wedding
            weekend and to collect RSVPs. <strong>There is no invitation coming - this is it!</strong>
        </p>
        <p>
            <span class="todo">[Please let us know everyone in your party who will be attending.]</span>
            We need to know if anyone is planning on staying on-site. <span class="todo">[Cabin registration isn't built yet, but...]</span>
            We would like to gauge interest in particular activities so we can plan the best weekend possible.
            Lawn games (cornhole, horseshoes, etc.) and sporting equipment (soccer, baseball, tennis, and basketball)
            will definitely be available. You will not be required to participate in anything if all you want to do is
            relax and enjoy the scenery! If you have a special skill that you’d like to share with other guests
            (for example: yoga instruction, outdoor survival skills, birdwatching) or an activity you’d like to host,
            <a href="#">contact us</a> with your idea!
        </p>
        <p class="todo">@todo make this a pick your top 3 situation.</p>
    </div>
</div>
<div class="container-fluid" id="camper-info-form">
    <form class="user-info">
        <input type="hidden" id="userid" value="{{$user->id}}">
    </form>
    <div class="container-fluid" id="rsvp-guests-container">
        <p class="clarendon-headline">Campers</p>
        <p class="todo">[Please let us know who is coming - We took our best guess]</p>
        <div id="rsvp-guests-form">
            @foreach($user->guests as $guest)
                @include('rsvp._form-rsvp-guest')
            @endforeach
            @include('rsvp._form-rsvp-guest-add')
        </div>
        <button type="button" class="button-rsvp-add-guest btn btn-success btn-xs">Add</button>
        <div id="rsvp-submit-area">
            <button type="button" class="btn-primary btn" id="btn-user-guest-submit">Confirm RSVP</button>
        </div>
    </div>
</div>
@stop
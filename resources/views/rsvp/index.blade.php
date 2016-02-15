@extends("layout")

@section("content")
<div class="container-fluid" id="registration-info">
    <p class="clarendon-headline">Welcome to Camp Schwartzelrod!</p>
    <div class="content">
        <p>
            As you have probably figured out by now, we will be using this website to provide information about our wedding weekend and to collect RSVPs.
            <strong>There is no invitation coming - this is it!</strong>
        </p>
        <p>
            Please fill out the information below to complete your RSVP. We’re trying to plan the ultimate camp weekend
            so we need to know who is coming, where they’re planning to stay, and what activities they would like to do.
            Lawn games (cornhole, horseshoes, etc.) and sporting equipment (soccer, baseball, tennis, and basketball)
            will definitely be available throughout the weekend. You will not be required to participate in anything if
            all you want to do is relax and enjoy the scenery! If you have a special skill that you’d like to share with
            other guests (for example: yoga instruction, outdoor survival skills, birdwatching, art) or an activity you’d
            like to host, please <a href="#">contact us</a> with your idea!
        </p>
        <p class="highway-subhead txt-centered">PLEASE SUBMIT YOUR RSVP BY AUGUST 1ST<p>
    </div>
</div>
<div class="container-fluid" id="camper-info-form">
    <form class="user-info">
        <input type="hidden" id="userid" value="{{$user->id}}">
        <input type="hidden" id="maxguests" value="{{ $user->max_guests }}">
    </form>
    <div id="rsvp-guests-container">
        <p class="clarendon-headline txt-centered">Campers</p>
        @if(is_null($rsvp))
        <p class="todo txt-centered">Please let us know who is coming - We took our best guess!</p>
        @endif
        <div id="rsvp-guests-form">
            @foreach($user->guests as $guest)
                @include('rsvp._form-rsvp-guest')
            @endforeach
            @include('rsvp._form-rsvp-guest-add')
        </div>
    </div>
    <div id="add-camper-row">
        @include('rsvp._add-camper')
    </div>
    <div id="rsvp-submit-area">
        <button type="button" class="btn-primary btn btn-lg" id="btn-user-guest-submit">Confirm RSVP</button>
    </div>
</div>
@stop
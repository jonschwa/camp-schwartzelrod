@extends("layout")

@section("content")
    <div class="container">
        <h1>Guests</h1>
        <p>This is where you will edit your guests!</p>
        {{-- @todo check for rsvp and reming if they need to do it! --}}
        <ul>
            <li>who is coming</li>
            <li>select some activities</li>
        </ul>
    </div>
    <div class="container">
        <form class="user-info">
            <input type="hidden" id="userid" value="{{$user->id}}">
        </form>
        <div id="rsvp-guests-container">
            <h3>Guests</h3>
            <p>Here are the guests:</p>
            @foreach($user->guests as $guest)
                @include('rsvp._form-rsvp-guest')
            @endforeach
            @include('rsvp._form-rsvp-guest-add')
        </div>
        <button type="button" class="button-rsvp-add-guest btn btn-success btn-xs">Add</button>
    </div>
    <div class="container">
        <div id="rsvp-submit-area">
            <button type="button" id="btn-user-guest-submit" class="btn-primary btn">Finish and submit!</button>
        </div>
    </div>
@stop
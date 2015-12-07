@extends("layout")

@section("content")
    <div class="container-fluid">
        <h1>Rsvp</h1>
        <p>This is where we'll have some info about the rsvp process</p>
        <ul>
            <li>who is coming</li>
            <li>select some activities</li>
        </ul>
    </div>
    <div class="container-fluid">
        <form class="user-info">
            <input type="hidden" id="userid" value="{{$user->id}}">
        </form>
        <div class="container-fluid" id="rsvp-guests-container">
            <h3>Guests</h3>
            <p>Here are the guests:</p>
            @foreach($user->guests as $guest)
                @include('rsvp._form-rsvp-guest')
            @endforeach
            @include('rsvp._form-rsvp-guest-add')
        </div>
        <button type="button" class="button-rsvp-add-guest btn btn-success btn-xs">Add</button>
    </div>
    <div class="container-fluid">
        <div id="rsvp-submit-area">
            <button type="button" class="btn-primary btn" id="btn-user-guest-submit">Confirm RSVP</button>
        </div>
    </div>
@stop
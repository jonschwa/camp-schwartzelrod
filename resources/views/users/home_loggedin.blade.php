@extends("layout")

@section("content")
    <div class="container">
        <h1>You're logged in!</h1>
        <div id="user-tasks">
            <div class="row">
                <div class="col-md-4">
                    <h3>RSVP</h3>
                    @if(is_null($user->rsvp))
                        <p>You haven't rsvped!</p>
                        <p><a href="/user/rsvp">Do it now!</a></p>
                    @else
                        <p>Thanks! You've rsvped!</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <h3>Attendees</h3> <!-- todo edit button! --!>
                    @if(!is_null($user->guests))
                        @foreach($user->guests as $guest)
                            <div class="homepage-guest-info-block">
                                <h3>{{ $guest->first_name }} {{ $guest->last_name }}</h3>
                                @if($guest->is_adult == 1)
                                    <p>Adult</p>
                                @else
                                    <p>Child</p>
                                @endif
                                @if($guest->is_staying == 1)
                                    <p>Is Staying Onsite</p>
                                @else
                                    <p>Not Staying Onsite</p>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-4">
                    <h3>Cabins (coming soon)</h3>
                </div>
            </div>
        </div>
    </div>
@stop


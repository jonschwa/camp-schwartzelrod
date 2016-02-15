@extends("layout")
@section("content")
    <div id="logged-in-homepage-header" class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-3">
                {{--<object id="camp-logo" class="svg" data="/img/camp-logo.svg" type="image/svg+xml"></object>--}}
                <img id="camp-logo" class="svg" src="/img/camp-logo.svg"/>
            </div>
            <div class="col-md-4" id="logged-in-rsvp-status">
                <p class="clarendon-headline">Your RSVP:
                    @if(is_null($rsvp))
                        ????
                    @else
                        @if($rsvp->will_attend == 1)
                            Yes
                        @elseif($rsvp->will_attend == 0)
                            No
                        @elseif($rsvp->will_attend == -1)
                            Maybe
                        @endif
                    @endif
                </p>
                <p>
                    @if(is_null($rsvp))
                        <p>You haven't rsvped yet. <a href="/rsvp">Do it now!</a></p>
                    @else
                        <p>
                            @if($rsvp->will_attend == 1)
                                We can't wait to see you!
                            @elseif($rsvp->will_attend == 0)
                                But it seems like you changed your mind! You can click <a href="/rsvp">here</a> to RSVP
                            @elseif($rsvp->will_attend == -1)
                                You can click <a href="/rsvp">here</a> to RSVP
                            @endif
                        </p>
                    @endif
                </p>
            </div>
        </div>
    </div>
    @if(!is_null($rsvp) && $rsvp->will_attend == 1)
    <div class="container-fluid" id="logged-in-guests-container">
        <div class="row">
            <div class="col-md-12">
                <p class="clarendon-subhead">Guests</p> <!-- todo change text for when not rsvp-ed --!>
                    @if(!is_null($user->guests))
                            <p>Here are the guests that you have said are coming. If you need to modify this, click <a href="/rsvp">here</a>.

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

                    <a href="/rsvp">Update your rsvp status</a></p>
            </div><p>
        </div>
    </div>
     @endif

    {{--<div class="container">--}}
        {{--<h1>You're logged in!</h1>--}}
        {{--<div id="user-tasks">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<h3>RSVP</h3>--}}
                    {{--@if(is_null($rsvp))--}}
                        {{--<p>You haven't rsvped!</p>--}}
                        {{--<p><a href="/rsvp">Do it now!</a></p>--}}
                    {{--@else--}}
                        {{--<p>You have rsvped--}}
                        {{--@if($rsvp->will_attend == 1)--}}
                            {{--yes--}}
                        {{--@elseif($rsvp->will_attend == 0)--}}
                            {{--no--}}
                        {{--@elseif($rsvp->will_attend == -1)--}}
                            {{--maybe--}}
                        {{--@endif--}}
                        {{--</p>--}}
                    {{--@endif--}}
                    {{--<p><a href="/rsvp">Update your rsvp status</a></p>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
{{--                    <h3>Attendees</h3> <!-- todo edit button! --!>
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
                    @endif--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<h3>Cabins (coming soon)</h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop


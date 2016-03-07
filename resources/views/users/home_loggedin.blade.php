@extends("layout")
@section("content")
    <div id="logged-in-homepage-header" class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-2 col-xs-12">
                {{--<object id="camp-logo" class="svg" data="/img/camp-logo.svg" type="image/svg+xml"></object>--}}
                <div class="icon-camp-logo rsvp-logo-header"></div>
            </div>
            <div class="col-md-6 col-xs-12" id="logged-in-rsvp-status">
                <p class="clarendon-headline">Your RSVP:
                    @include('rsvp._check-rsvp')
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
        <div class="row" id="logged-in-guests-cards">
            <div class="col-md-12">
                <p class="clarendon-subhead">Guests</p>
                @if(!is_null($user->guests))
                    <div id="rsvp-guest-list">
                        <p>Here are the guests that you have said are coming. If you need to modify this, click <a href="/rsvp">here</a>.
                        @foreach($user->guests as $key => $guest)
                            @if($key == 0 || $key == 2 || $key == 4)
                                <div class="row">
                            @endif
                            <div class="col-md-6 col-xs-12 guest-rsvp-card">
                                @include('guests.rsvp-info')
                            </div>
                            @if($key == 1 || $key == 3 || $key == 5)
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        @include('rsvp._logged-in-lodging-summary')
    @endif
    @if(!is_null($rsvp))
        <a href="/rsvp"><button id="btn-update-camper-info" class="button btn-primary btn-lg">Update RSVP Info</button></a>
    @endif
@stop


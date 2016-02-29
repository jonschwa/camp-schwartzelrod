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
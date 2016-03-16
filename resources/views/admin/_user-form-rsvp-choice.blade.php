@if($rsvp->will_attend == 1)
    Yes
@elseif($rsvp->will_attend == 0)
    No
@elseif($rsvp->will_attend == -1)
    Maybe
@else
    Opted Out
@endif
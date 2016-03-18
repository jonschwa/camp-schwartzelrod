@if($rsvp->user->guests->first()->is_staying == 1)
    @if($rsvp->user->guests->first()->in_cabin == 1)
        Cabin - Cabin adventure level {{$rsvp->user->guests->first()->cabin_adventure_level}}
    @else
        BYO - {{$rsvp->user->guests->first()->byo_plan}}
    @endif
@else
    Off Site - {{$rsvp->user->guests->first()->hotel_choice}}
@endif
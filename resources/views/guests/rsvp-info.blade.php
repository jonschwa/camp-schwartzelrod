<div class="homepage-guest-info-block rsvp-guest-interests">
    <div class="clarendon-subhead">
        {{ $guest->first_name }} {{ $guest->last_name }}
    </div>
    <div class="rsvp-guest-selections">
        <div class="row">
            @if($guest->is_adult == 0)
                <p class="highway-subhead">Child @if(!is_null($guest->child_age)) ({{$guest->child_age}}) @endif</p>
            @else
                <p class="highway-subhead">Adult</p>
            @endif
        </div>
        <div class="row">
            @if($guest->friday_bbq == 1)
                <p class="highway-subhead">Attending Friday BBQ</p>
            @endif
        </div>
        <div class="row">
            <p class="highway-subhead">
                @if($guest->fri_camp_activities == 1)
                    Friday
                @endif
                @if($guest->sat_camp_activities == 1 && $guest->fri_camp_activities == 1)
                    and
                @endif
                @if($guest->sat_camp_activities == 1)
                    Saturday
                @endif
                @if($guest->sat_camp_activities == 1 || $guest->fri_camp_activities == 1)
                    Camp Activities
                @endif
            </p>
        </div>
    </div>
    <div class="selected-activities-container">
        @include('guests.selected-activity-icons')
    </div>

    {{--@if($guest->is_staying == 1)--}}
        {{--<p>Is Staying Onsite</p>--}}
    {{--@else--}}
        {{--<p>Not Staying Onsite</p>--}}
    {{--@endif--}}
</div>
<div class="guest-rsvp-container">
    <form class="rsvp-guest-interests" id="{{ uniqid() }}">
        <input type="hidden" name="guestid" value="{{$guest->id}}">
        <div class="form-rsvp-guest-header">
            <div class="row">
                <div class="col-md-3">
                    <p class="highway-headline">Camper:</p>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control rsvp-camper-lg-input" type="text" name="first-name" placeholder="First Name" value="{{ $guest->first_name }}">
                        <label class="control-label error-label" style="display:none;"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control rsvp-camper-lg-input" type="text" name="last-name" placeholder="Last Name" value="{{ $guest->last_name }}">
                        <label class="control-label error-label" style="display:none;"></label>
                    </div>
                </div>
                <div class="button-rsvp-remove-guest glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Delete this camper"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-inline child-age-form" @if($guest->is_adult == 1) style="display:none" @endif>
                <label class="highway-headline age-input-label">Age:</label>
                <div class="form-group">
                    <input class="form-control rsvp-camper-lg-input child-age-input" style="width:50px;" type="text" name="child-age" value="{{ $guest->child_age }}">
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1 rsvp-camper-adult-toggle">
                <div class="checkbox">
                    <label>
                        <input name="is-child" type="checkbox" @if($guest->is_adult == 0) checked @endif>Child (under 13 years)
                    </label>
                </div>
            </div>
        </div>
        <div class="row guest-form-row">
            <p class="highway-headline">Events</p>
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input name="friday-bbq" type="checkbox" @if($guest->friday_bbq == 1) checked @endif>Friday BBQ
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="cb-activities friday-activities" name="fri-camp-activities" type="checkbox" @if($guest->fri_camp_activities == 1) checked @endif>Friday Camp Activities
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input class="cb-activities saturday-activities" name="sat-camp-activities" type="checkbox" @if($guest->sat_camp_activities == 1) checked @endif>Saturday Camp Activities
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="wedding-attend" type="checkbox" @if(is_null($rsvp) || $guest->wedding_attend == 1) checked @endif>The Wedding
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @include('rsvp._activity-selection')
    </form>
</div>
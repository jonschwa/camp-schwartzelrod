<div class="guest-rsvp-container blank" style="display:none;">
    <form class="rsvp-guest-interests">
        <input type="hidden" name="guestid" value="0">
        <div class="form-rsvp-guest-header">
            <div class="row">
                <div class="col-md-3">
                    <p class="clarendon-subhead">Camper:</p>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control rsvp-camper-lg-input" type="text" name="first-name" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control rsvp-camper-lg-input" type="text" name="last-name" placeholder="Last Name">
                    </div>
                </div>
                <div class="button-rsvp-remove-guest glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Delete this camper"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-inline child-age-form" style="display:none">
                <label class="age-input-label">Age:</label>
                <div class="form-group">
                    <input class="form-control rsvp-camper-lg-input child-age-input" style="width:50px;" type="text" name="child-age">
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1 rsvp-camper-adult-toggle">
                <div class="checkbox">
                    <label>
                        <input name="is-child" type="checkbox">Child (under 13 years)
                    </label>
                </div>
            </div>
        </div>
        <div class="row guest-form-row">
            <p class="clarendon-subhead">Events</p>
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input name="friday-bbq" type="checkbox">Friday BBQ
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="cb-activities friday-activities" name="fri-camp-activities" type="checkbox">Friday Camp Activities
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input class="cb-activities saturday-activities" name="sat-camp-activities" type="checkbox">Saturday Camp Activities
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="wedding-attend" type="checkbox">Our Wedding
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @include('rsvp._activity-selection')
        <div class="row guest-form-row">
            <p class="clarendon-subhead">
                Lodging
                <span class="highway-subhead review-lodging-link"><a target="_blank" href="/#lodging-info">Review Options <span class="glyphicon glyphicon-new-window"></span></a></span>
            </p>
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input name="is-staying" class="cb-is-staying" type="checkbox">Staying at camp in a cabin
                    </label>
                </div>
            </div>
        </div>
        <div class="cabin-details" style="display:none;">
            <div class="row">
                <div class="col-md-12">
                    @include('rsvp._cabin-adventure-level')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Each cabin accommodates 8-10 people. If you know who you would like as your bunkmates, please enter their names here:</p>
                    <div class="form-group">
                        <textarea rows="3" class="rsvp-bunkmates form-control input" name="desired-bunkmates" placeholder="Desired bunkmates?">@if(!empty($guest->desired_bunkmates)) {{ $guest->desired_bunkmates }} @endif</textarea>
                    </div>
                    <p class="txt-centered">We will do our best to arrange everyone fairly and to honor your bunkmate requests.</p>
                </div>
            </div>
        </div>
    </form>
</div>
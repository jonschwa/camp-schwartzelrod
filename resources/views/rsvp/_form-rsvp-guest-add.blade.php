<div class="guest-rsvp-container blank" style="display:none;">
    <form class="rsvp-guest-interests">
        <input type="hidden" name="guestid" value="0">
        <div class="form-rsvp-guest-header">
            <div class="row">
                <p class="clarendon-subhead">Camper Info</p>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first-name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last-name">
                    </div>
                </div>
                <div class="button-rsvp-remove-guest glyphicon glyphicon-remove"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input name="is-child" type="checkbox">Child (under 13 years)
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group child-age-form" style="display:none;">
                    <label>Age</label>
                    <input class="form-control" type="text" name="child-age">
                </div>
            </div>
        </div>
        <div class="row">
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
                            <input name="fri-camp-activities" type="checkbox">Friday Camp Activities
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input name="sat-camp-activities" type="checkbox">Saturday Camp Activities
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
        <div class="row">
            <p class="clarendon-subhead">Lodging</p>
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
                    @include('rsvp._cabin-adventure-level-template')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Each cabin accommodates 8-10 people. If you know who you would like as your bunkmates, please enter their names here:</p>
                    <div class="form-group">
                        <textarea rows="3" class="rsvp-bunkmates form-control input" name="desired-bunkmates" placeholder="Desired bunkmates?"></textarea>
                    </div>
                    <p class="txt-centered">We will do our best to arrange everyone fairly and to honor your bunkmate requests.</p>
                </div>
            </div>
        </div>
        @include('rsvp._activity-selection-template')
    </form>
</div>
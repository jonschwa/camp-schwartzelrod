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
            <div class="col-md-5">
                <div class="checkbox">
                    <label>
                        <input name="is-child" type="checkbox">This person is a child
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input name="is-staying" class="cb-is-staying" type="checkbox">This person will be staying on-site in a cabin
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
        </div>
        @include('rsvp._activity-selection')
    </form>
</div>
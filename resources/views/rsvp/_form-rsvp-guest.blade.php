<div class="guest-rsvp-container">
    <form class="rsvp-guest-interests">
        <input type="hidden" name="guestid" value="{{$guest->id}}">
        <div class="form-rsvp-guest-header">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first-name" value="{{ $guest->first_name }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last-name" value="{{ $guest->last_name }}">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <button type="button" class="button-rsvp-remove-guest btn btn-danger btn-xs">Remove</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="checkbox">
                    <label>
                        <input name="is-adult" type="checkbox" @if($guest->is_adult == 1) checked @endif>This person is an adult
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input name="is-staying" class="cb-is-staying" type="checkbox" @if($guest->is_staying == 1) checked @endif>This person will be staying on-site in a cabin
                    </label>
                </div>
            </div>
        </div>
        <div class="cabin-details" @if($guest->is_staying == 0) style="display:none;" @endif >
            <div class="row">
                <div class="col-md-12">
                    <div class="cabin-adventure-level">
                        <p class="clarendon-subhead">Cabin Preference</p>
                        Cabin Adventure Level: <input type="text" name="cabin-adventure-level" value="{{ $guest->cabin_adventure_level }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="guest-activities">
                    <p class="clarendon-subhead">Activities</p>
                    <p>Pick your top 3!</p>
                    <div>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-archery">Archery</span>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-boating">Boating</span>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-swimming">Swimming</span>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-arts-and-crafts">Arts & Crafts</span>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-sports">Sports</span>
                        <span class="activityIcon" aria-hidden="true" input-name="interested-bbq">Friday BBQ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-archery" type="checkbox">Archery
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-boating" type="checkbox">Boating
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-swimming" type="checkbox">Swimming
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-arts-and-crafts" type="checkbox">Arts & Crafts
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-sports" type="checkbox">Sports
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-good-time" type="checkbox">A really fucking good time
            </label>
        </div>
        <div class="checkbox hidden-input">
            <label>
                <input name="interested-bbq" type="checkbox">Friday BBQ
            </label>
        </div>
    </form>
</div>
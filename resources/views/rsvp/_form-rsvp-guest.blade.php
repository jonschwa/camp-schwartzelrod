<div class="guest-rsvp-container">
    <form class="rsvp-guest-interests">
            <input type="hidden" name="guestid" value="{{$guest->id}}">
            <div class="form-rsvp-guest-header">
                <span><input type="text" name="first-name" value="{{ $guest->first_name }}"></span>
                <span><input type="text" name="last-name" value="{{ $guest->last_name }}"></span>
                <span><button type="button" class="button-rsvp-remove-guest btn btn-danger btn-xs">Remove</button></span>
            </div>
        <div class="checkbox">
            <label>
                <input name="is-adult" type="checkbox">This person is an adult
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="is-staying" type="checkbox">This person will be staying on-site in a cabin
            </label>
        </div>
        <p>And would be interested in these activities:</p>
        <div class="checkbox">
            <label>
                <input name="interested-archery" type="checkbox">Archery
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-boating" type="checkbox">Boating
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-swimming" type="checkbox">Swimming
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-arts-and-crafts" type="checkbox">Arts & Crafts
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-sports" type="checkbox">Sports
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-good-time" type="checkbox">A really fucking good time
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input name="interested-bbq" type="checkbox">Friday BBQ
            </label>
        </div>
    </form>
</div>
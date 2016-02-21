<div class="offsite-details" @if($guest->is_staying == 0 && is_null($rsvp) || $guest->is_staying == 1) style="display:none;" @endif >
    <div class="row">
        <div class="highway-headline txt-centered">Do you know where you plan to stay?</div>
        <div class="col-md-12">
            <select class="form-control" id="offsite-lodging-options-select">
                <option value="" disabled>Please Select:</option>
                <option value="shore-acres-inn">Shore Acres Inn</option>
                <option value="north-hero-house">North Hero House</option>
                <option value="hampton-inn">Hampton Inn</option>
                <option value="airbnb">AirBNB</option>
                <option value="other">Other/Not sure yet</option>
            </select>
        </div>
        <div class="col-md-12">
            <div class="offsite-lodging-feedback txt-centered">

            </div>
        </div>
    </div>
</div>
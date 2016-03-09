<div class="offsite-details" @if($guest->is_staying == 0 && is_null($rsvp) || $guest->is_staying == 1) style="display:none;" @endif >
    <div class="row">
        <div class="highway-headline txt-centered">Where are you planning to stay?</div>
        <div class="col-md-12">
            <select class="form-control" id="offsite-lodging-options-select">
                <option value="" @if(is_null($rsvp)) selected @endif disabled>Please Select:</option>
                <option value="shore-acres-inn" @if($lodging->hotel_choice == "shore-acres-inn") selected @endif>Shore Acres Inn</option>
                <option value="north-hero-house" @if($lodging->hotel_choice == "north-hero-house") selected @endif>North Hero House</option>
                <option value="hampton-inn" @if($lodging->hotel_choice == "hampton-inn") selected @endif>Hampton Inn</option>
                <option value="airbnb" @if($lodging->hotel_choice == "airbnb") selected @endif>AirBNB</option>
                <option value="other" @if($lodging->hotel_choice == "other") selected @endif>Other/Not sure yet</option>
            </select>
        </div>
        <div class="col-md-12">
            <div class="offsite-lodging-feedback txt-centered">
                @include('rsvp._hotel-additional-info')
            </div>
        </div>
    </div>
</div>
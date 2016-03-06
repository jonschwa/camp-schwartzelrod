<div class="offsite-details" @if($guest->is_staying == 0 && is_null($rsvp) || $guest->is_staying == 1) style="display:none;" @endif >
    <div class="row">
        <div class="highway-subhead txt-centered">Where are you planning to stay?</div>
        <div class="col-md-12">
            <select class="form-control" id="offsite-lodging-options-select">
                <option value="" disabled>Please Select:</option>
                <option value="shore-acres-inn" @if($lodging->hotel_choice == "shore-acres-inn") selected @endif>Shore Acres Inn</option>
                <option value="north-hero-house" @if($lodging->hotel_choice == "north-hero-house") selected @endif>North Hero House</option>
                <option value="hampton-inn" @if($lodging->hotel_choice == "hampton-inn") selected @endif>Hampton Inn</option>
                <option value="airbnb" @if($lodging->hotel_choice == "airbnb") selected @endif>AirBNB</option>
                <option value="other" @if($lodging->hotel_choice == "other") selected @endif>Other/Not sure yet</option>
            </select>
        </div>
        <div class="col-md-12">
            <div class="offsite-lodging-feedback txt-centered">
                <div id="hampton-inn" class="additional-info" @if($lodging->hotel_choice != "hampton-inn") style="display:none;" @endif>
                    <p><strong>Please do not book a room yet.</strong></p>
                    <p>If enough people want to stay at the Hampton Inn, we will lock in the group rate and email you instructions to book a room.</p>
                </div>
                <div id="shore-acres-inn" class="additional-info" @if($lodging->hotel_choice != "shore-acres-inn") style="display:none;" @endif>
                    <p>You can book a room on the <a href="http://www.shoreacres.com/" target="_blank">Shore Acres website</a> or call them at 802-372-8722</p>
                </div>
                <div id="north-hero-house" class="additional-info" @if($lodging->hotel_choice != "north-hero-house") style="display:none;" @endif>
                    <p>You can book a room on the <a href="http://www.northherohouse.com/" target="_blank">North Hero House website</a> or call them at 1-888-525-3644</p>
                </div>
            </div>
        </div>
    </div>
</div>
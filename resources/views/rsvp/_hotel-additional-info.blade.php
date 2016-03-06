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
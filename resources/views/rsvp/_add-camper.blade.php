<div class="row">
    <div class="col-md-12" id="add-guest-button">
        @if($user->guests->count() < $user->max_guests)
        <button type="button" id="button-rsvp-add-guest" class="highway-subhead btn btn-success">Add a camper</button>
        @endif
    </div>
</div>

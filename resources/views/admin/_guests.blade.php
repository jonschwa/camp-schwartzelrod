<div class="row admin-section">
    <div class="col-md-12">
        <div class="row">
            <p class="clarendon-subhead txt-centered">Guests</p>
        </div>
        <div class="row">
            <p class="highway-headline green txt-centered">Attending</p>
            @foreach($rsvps['yes'] as $rsvp)
                <div class="col-md-4 txt-centered">
                    <p class="user-email">{{ $rsvp->user->email }}</p>
                    <div class="guests">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
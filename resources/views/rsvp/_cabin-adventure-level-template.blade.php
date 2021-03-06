<div class="cabin-adventure-level">
    <p class="highway-headline txt-centered">Choose your Cabin Adventure Level&#8482;</p>
    <div class="container-fluid" id="cabin-adventure-level-decription">
        <div class="col-md-3 cal-option-container" level="1">
            <div class="cal-option @if($guest->cabin_adventure_level == 1) selected @endif">
                <img class="img-circle" src="https://placehold.it/80x80">
                <p>Private cabin</p>
                Just me and my related guests
            </div>
        </div>
        <div class="col-md-3 cal-option-container" level="2">
            <div class="cal-option @if($guest->cabin_adventure_level == 2) selected @endif">
                <img class="img-circle" src="https://placehold.it/80x80">
                <p>Shared cabin<p>
                Me, my related guests, and close friends/family
            </div>
        </div>
        <div class="col-md-3 cal-option-container" level="3">
            <div class="cal-option @if($guest->cabin_adventure_level == 3) selected @endif">
                <img class="img-circle" src="https://placehold.it/80x80">
                <p>Group cabin</p>
                I’m willing to make new friends!
            </div>
        </div>
        <div class="col-md-3 cal-option-container" level="4">
            <div class="cal-option @if($guest->cabin_adventure_level == 4) selected @endif">
                <img class="img-circle" src="https://placehold.it/80x80">
                <p>Party cabin<p>
                I don’t care if I’m sleeping with 9 strangers
            </div>
        </div>
    </div>
    <input type="hidden" name="cabin-adventure-level" value="{{ $guest->cabin_adventure_level }}">
</div>
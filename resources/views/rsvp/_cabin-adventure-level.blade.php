<div class="cabin-adventure-level">
    <p class="txt-centered">Cabin registration and payment are coming soon - we will email you when it’s ready! For now, please let us know your preferences and we will guarantee you a place to stay.</p>
    <p class="highway-headline txt-centered">Choose your Cabin Adventure Level&#8482;</p>
    <p class="activity-error-label control-label error-label txt-centered" id="no-cal-selected-error" style="display:none;"></p>
    <div class="container-fluid" id="cabin-adventure-level-decription">
        <div class="col-md-3 col-xs-6 cal-option-container @if($lodging->cabin_adventure_level == 1) selected @endif" level="1">
            <div class="cal-option">
                <div class="icon-cal1-private cal-icon"></div>
                <p class="highway-subhead cal-title">Private cabin</p>
                Just me and my related guests
            </div>
        </div>
        <div class="col-md-3 col-xs-6 cal-option-container @if($lodging->cabin_adventure_level == 2) selected @endif" level="2">
            <div class="cal-option">
                <div class="icon-cal2-shared cal-icon"></div>
                <p class="highway-subhead cal-title">Shared cabin<p>
                Me, my related guests, and close friends/family
            </div>
        </div>
        <div class="col-md-3 col-xs-6 cal-option-container @if($lodging->cabin_adventure_level == 3) selected @endif" level="3">
            <div class="cal-option">
                <div class="icon-cal3-group cal-icon"></div>
                <p class="highway-subhead cal-title">Group cabin</p>
                I’m willing to make new friends!
            </div>
        </div>
        <div class="col-md-3 col-xs-6 cal-option-container @if($lodging->cabin_adventure_level == 4) selected @endif" level="4">
            <div class="cal-option">
                <div class="icon-cal4-party cal-icon"></div>
                <p class="highway-subhead cal-title">Party cabin<p>
                I don’t care if I’m sleeping with 9 strangers
            </div>
        </div>
    </div>
    <input type="hidden" name="cabin-adventure-level" value="{{ $lodging->cabin_adventure_level }}">
</div>
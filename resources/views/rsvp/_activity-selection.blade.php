<div class="row activity-selection-form" @if($guest->fri_camp_activities == 0 && $guest->sat_camp_activities == 0) style="display:none;" @endif>
    <div class="col-md-12">
        <div class="guest-activities">
            <div class="activities-header">
                <span class="clarendon-subhead">Activities </span>
                <span class="highway-subhead top3-instructions">Pick your top 3!</span>
            </div>
            <div class="row activity-icon-row">
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_archery == 0) interest-inactive @else interest-active @endif"  aria-hidden="true" input-name="interested-archery"><div class="icon-archery activity-icon-font"></div><p class="highway-subhead">Archery</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_boating == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-boating"><div class="icon-boating activity-icon-font"></div><p class="highway-subhead">Boating</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_swimming == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-swimming"><div class="icon-swimming activity-icon-font"></div><p class="highway-subhead">Swimming</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_kickball == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-kickball"><div class="icon-kickball activity-icon-font"></div><p class="highway-subhead">Kickball</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_soccer == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-soccer"><div class="icon-soccer activity-icon-font"></div><p class="highway-subhead">Soccer</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_tennis == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-tennis"><div class="icon-tennis activity-icon-font"></div><p class="highway-subhead">Tennis</p></span>
                </div>
            </div>
            <div class="row activity-icon-row">
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_capture_the_flag == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-ctf"><div class="icon-capture-flag activity-icon-font"></div><p class="highway-subhead">Capture the Flag</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_scavenger_hunt == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-scavenger-hunt"><div class="icon-scavenger-hunt activity-icon-font"></div><p class="highway-subhead">Scavenger Hunt</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_volleyball == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-volleyball"><div class="icon-volleyball activity-icon-font"></div><p class="highway-subhead">Volleyball</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_football == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-football"><div class="icon-football activity-icon-font"></div><p class="highway-subhead">Football</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_frisbee == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-frisbee"><div class="icon-frisbee activity-icon-font"></div><p class="highway-subhead">Ultimate Frisbee</p></span>
                </div>
                <div class="col-md-2">
                    <span class="activityIcon @if($guest->interested_arts_and_crafts == 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-arts-and-crafts"><div class="icon-arts-crafts activity-icon-font"></div><p class="highway-subhead">Arts & Crafts</p></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_archery == 1) checked @endif name="interested-archery" type="checkbox" class="activity-checkbox">Archery
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_boating == 1) checked @endif name="interested-boating" type="checkbox" class="activity-checkbox">Boating
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_swimming == 1) checked @endif name="interested-swimming" type="checkbox" class="activity-checkbox">Swimming
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_arts_and_crafts == 1) checked @endif name="interested-arts-and-crafts" type="checkbox" class="activity-checkbox">Arts & Crafts
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_soccer == 1) checked @endif name="interested-soccer" type="checkbox" class="activity-checkbox">Soccer
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_tennis == 1) checked @endif name="interested-tennis" type="checkbox" class="activity-checkbox">Tennis
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_volleyball == 1) checked @endif name="interested-volleyball" type="checkbox" class="activity-checkbox">Volleyball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_football == 1) checked @endif name="interested-football" type="checkbox" class="activity-checkbox">Football
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_frisbee == 1) checked @endif name="interested-frisbee" type="checkbox" class="activity-checkbox">Ultimate Frisbee
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_kickball == 1) checked @endif name="interested-kickball" type="checkbox" class="activity-checkbox">Dodgeball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_scavenger_hunt == 1) checked @endif name="interested-scavenger-hunt" type="checkbox" class="activity-checkbox">Scavenger Hunt
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_capture_the_flag == 1) checked @endif name="interested-ctf" type="checkbox" class="activity-checkbox">Capture the Flag
    </label>
</div>
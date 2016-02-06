<div class="row">
    <div class="col-md-12">
        <div class="guest-activities">
            <p class="clarendon-subhead">Activities</p>
            <p class="todo">[Pick your top 3!]</p>
            <div>
                <span class="activityIcon @if($guest->interested_archery === 0) interest-inactive @else interest-active @endif"  aria-hidden="true" input-name="interested-archery">Archery</span>
                <span class="activityIcon @if($guest->interested_boating === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-boating">Boating</span>
                <span class="activityIcon @if($guest->interested_swimming === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-swimming">Swimming</span>
                <span class="activityIcon @if($guest->interested_arts_and_crafts === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-arts-and-crafts">Arts & Crafts</span>
                <span class="activityIcon @if($guest->interested_soccer === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-soccer">Soccer</span>
                <span class="activityIcon @if($guest->interested_tennis === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-tennis">Tennis</span>
                <span class="activityIcon @if($guest->interested_basketball === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-basketball">Basketball</span>
                <span class="activityIcon @if($guest->interested_baseball === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-baseball">Baseball</span>
                <span class="activityIcon @if($guest->interested_volleyball === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-volleyball">Volleyball</span>
                <span class="activityIcon @if($guest->interested_football === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-football">Football</span>
                <span class="activityIcon @if($guest->interested_frisbee === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-frisbee">Ultimate Frisbee</span>
                <span class="activityIcon @if($guest->interested_kickball === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-kickball">Kickball</span>
                <span class="activityIcon @if($guest->interested_capture_the_flag === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-ctf">Capture the Flag</span>
                <span class="activityIcon @if($guest->interested_scavenger_hunt === 0) interest-inactive @else interest-active @endif" aria-hidden="true" input-name="interested-scavenger-hunt">Scavenger Hunt</span>
            </div>
        </div>
    </div>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_archery === 1) checked @endif name="interested-archery" type="checkbox" class="activity-checkbox">Archery
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_boating === 1) checked @endif name="interested-boating" type="checkbox" class="activity-checkbox">Boating
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_swimming === 1) checked @endif name="interested-swimming" type="checkbox" class="activity-checkbox">Swimming
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_arts_and_crafts === 1) checked @endif name="interested-arts-and-crafts" type="checkbox" class="activity-checkbox">Arts & Crafts
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_soccer === 1) checked @endif name="interested-soccer" type="checkbox" class="activity-checkbox">Soccer
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_tennis === 1) checked @endif name="interested-tennis" type="checkbox" class="activity-checkbox">Tennis
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_basketball === 1) checked @endif name="interested-basketball" type="checkbox" class="activity-checkbox">Basketball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_baseball === 1) checked @endif name="interested-baseball" type="checkbox" class="activity-checkbox">Baseball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_volleyball === 1) checked @endif name="interested-volleyball" type="checkbox" class="activity-checkbox">Volleyball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_football === 1) checked @endif name="interested-football" type="checkbox" class="activity-checkbox">Football
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_frisbee === 1) checked @endif name="interested-frisbee" type="checkbox" class="activity-checkbox">Ultimate Frisbee
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_kickball === 1) checked @endif name="interested-kickball" type="checkbox" class="activity-checkbox">Dodgeball
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_scavenger_hunt === 1) checked @endif name="interested-scavenger-hunt" type="checkbox" class="activity-checkbox">Scavenger Hunt
    </label>
</div>
<div class="checkbox hidden-input">
    <label>
        <input @if($guest->interested_capture_the_flag === 1) checked @endif name="interested-ctf" type="checkbox" class="activity-checkbox">Capture the Flag
    </label>
</div>
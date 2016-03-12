<div class="byo-details" @if($lodging->is_staying == 0 || $lodging->is_staying == 1 && $lodging->in_cabin == 1 || is_null($rsvp)) style="display:none;" @endif >
    <div class="row">
        <div class="highway-headline txt-centered">How adventurous of you!</div>
        <div class="col-md-12 txt-centered">
            <p>Please describe your plans and let us know if you need anything special to set up your shelter of choice.</p>
            <p class="activity-error-label control-label error-label txt-centered" id="no-byo-plan-error" style="display:none;"></p>
        </div>
        <div class="col-md-12">
            <div class="offsite-lodging-feedback txt-centered">
                <div class="form-group">
                    <textarea rows="3" class="rsvp-byo-plan form-control input" name="rsvp-byo-plan" id="byo-plan" i placeholder="What's your plan?">@if(!empty($lodging->byo_plan)){{ $lodging->byo_plan }}@endif</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
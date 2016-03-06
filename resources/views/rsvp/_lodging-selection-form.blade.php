<div class="container-fluid" id="lodging-info-form">
    <div class="logding-form-header txt-centered">
        <p class="clarendon-headline">Lodging</p>
        <p class="highway-subhead"><a target="_blank" href="/#lodging-info">Review Options <span class="glyphicon glyphicon-new-window"></span></a></p>
    </div>
    <form id="lodging-selection-form">
        <div class="container guest-lodging-container">
            <div class="col-md-12">
                <div class="row guest-form-row">
                    <p class="highway-subhead txt-centered">Where will your <span id="num-campers">{{ $numGuests }}</span> <span id="camper-label">@if($numGuests > 1) campers @else camper @endif</span> be staying?</p>
                    <div class="lodging-option-radio-row txt-centered">
                        <label class="radio-inline">
                            <input class="radio-is-staying" type="radio" name="is-staying" @if($guest->is_staying == 1 && $guest->in_cabin == 1) checked @endif value=true staying_in="cabin"> Staying at camp (cabin)
                        </label>
                        <label class="radio-inline">
                            <input class="radio-is-staying" type="radio" name="is-staying" @if($guest->is_staying == 1 && $guest->in_cabin == 0) checked @endif value=true staying_in="byo"> Staying at camp (BYO/Tent/RV)
                        </label>
                        <label class="radio-inline">
                            <input class="radio-is-staying" type="radio" name="is-staying" @if($guest->is_staying == 0 && !is_null($rsvp)) checked @endif value=false> Staying elsewhere
                        </label>
                    </div>
                </div>
                <div class="cabin-details" @if($lodging->is_staying == 0 || $lodging->is_staying == 1 && $lodging->in_cabin == 0) style="display:none;" @endif >
                    <div class="row">
                        <div class="col-md-12">
                            @include('rsvp._cabin-adventure-level')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bunkmates-ask">
                            <p>Each cabin accommodates 8-10 people. If you know who you would like as your bunkmates, please enter their names here:</p>
                            <div class="form-group">
                                <textarea rows="3" class="rsvp-bunkmates form-control input" name="desired-bunkmates" placeholder="Desired bunkmates?">@if(!empty($lodging->desired_bunkmates)) {{ $lodging->desired_bunkmates }} @endif</textarea>
                            </div>
                            <p class="txt-centered">We will do our best to arrange everyone fairly and to honor your bunkmate requests.</p>
                        </div>
                    </div>
                </div>
                @include('rsvp._offsite-stay-options')
                @include('rsvp._byo-plan')
            </div>
        </div>
    </form>
</div>
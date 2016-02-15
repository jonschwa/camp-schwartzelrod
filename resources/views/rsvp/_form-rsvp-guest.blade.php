<div class="guest-rsvp-container">
    <form class="rsvp-guest-interests">
        <input type="hidden" name="guestid" value="{{$guest->id}}">
        <div class="form-rsvp-guest-header">
            <div class="row">
                <p class="clarendon-subhead">Camper Info</p>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first-name" value="{{ $guest->first_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last-name" value="{{ $guest->last_name }}">
                    </div>
                </div>
                <div class="button-rsvp-remove-guest glyphicon glyphicon-remove"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input name="is-child" type="checkbox" @if($guest->is_adult == 0) checked @endif>Child (under 13 years)
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group child-age-form" @if($guest->is_adult == 1) style="display:none" @endif>
                    <label>Age</label>
                    <input class="form-control" type="text" name="child-age" value="{{ $guest->child_age }}">
                </div>
            </div>
        </div>
        <div class="row">
            <p class="clarendon-subhead">Events</p>
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input name="friday-bbq" type="checkbox" @if($guest->friday_bbq == 1) checked @endif>Friday BBQ
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="fri-camp-activities" type="checkbox" @if($guest->fri_camp_activities == 1) checked @endif>Friday Camp Activities
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input name="sat-camp-activities" type="checkbox" @if($guest->sat_camp_activities == 1) checked @endif>Saturday Camp Activities
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="wedding-attend" type="checkbox" @if($guest->wedding_attend == 1) checked @endif>Our Wedding
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <p class="clarendon-subhead">Lodging</p>
            <div class="col-md-6">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>

                <div class="checkbox">
                    <label>
                        <input name="is-staying" class="cb-is-staying" type="checkbox" @if($guest->is_staying == 1) checked @endif>Staying at camp in a cabin
                    </label>
                </div>
            </div>
        </div>
        <div class="cabin-details" @if($guest->is_staying == 0) style="display:none;" @endif >
            <div class="row">
                <div class="col-md-12">
                    @include('rsvp._cabin-adventure-level')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Each cabin accommodates 8-10 people. If you know who you would like as your bunkmates, please enter their names here:</p>
                    <div class="form-group">
                        <textarea rows="3" class="rsvp-bunkmates form-control input" name="desired-bunkmates" placeholder="Desired bunkmates?">@if(!empty($guest->desired_bunkmates)) {{ $guest->desired_bunkmates }} @endif</textarea>
                    </div>
                    <p class="txt-centered">We will do our best to arrange everyone fairly and to honor your bunkmate requests.</p>
                </div>
            </div>
        </div>
        @include('rsvp._activity-selection')
    </form>
</div>
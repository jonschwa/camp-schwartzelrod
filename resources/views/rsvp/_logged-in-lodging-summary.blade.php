<div id="logged-in-lodging-summary">
@if(!empty($onSiteInfo) && $onSiteInfo['staying_in'] == 'cabin')
    <p class="clarendon-subhead">Staying Onsite</p>
    <p class="highway-subhead">Cabin</p>
    <p>Cabin registration is coming soon - we will email you when it's ready!</p>
    @if($onSiteInfo['adventureLevel'] > 0)
        <p>Your Cabin Adventure Level&#8482;</p>
        <div class="icon-cal{{$onSiteInfo['adventureLevel']}}-group cal-icon"></div>
        <p class="lodging-cabin-adventure-level-name highway-subhead green">{{$cabinAdventureLevels[$onSiteInfo['adventureLevel']]}}</p>
    @endif
    @if(!is_null($onSiteInfo['bunkmates']))
        <p>Your Desired Bunkmates: {{$onSiteInfo['bunkmates']}}</p>
    @endif
@endif

@if(!empty($onSiteInfo) && $onSiteInfo['staying_in'] == 'byo')
        <p class="clarendon-subhead">Staying Onsite</p>
        <p class="highway-subhead">BYO</p>
        @if(!is_null($onSiteInfo['byo_plan']) && !empty($onSiteInfo['byo_plan']))
            <p class="lodging-byo-summary">{{ $onSiteInfo['byo_plan'] }}</p>
        @endif
@endif

@if(!empty($offSiteInfo))
    <p class="clarendon-subhead">Staying Offsite</p>
    @if(!empty($offSiteInfo['hotel_choice']) && !is_null($offSiteInfo['hotel_choice']))
        @if(isset($offSiteInfo['hotel_choice']))
            <p>{{ $hotelChoices[$offSiteInfo['hotel_choice']] }}</p>
            <div id="hampton-inn" class="additional-info" @if($offSiteInfo['hotel_choice'] != "hampton-inn") style="display:none;" @endif>
                <p><strong>Please do not book a room yet.</strong></p>
                <p>If enough people want to stay at the Hampton Inn, we will lock in the group rate and email you instructions to book a room.</p>
            </div>
            <div id="shore-acres-inn" class="additional-info" @if($offSiteInfo['hotel_choice'] != "shore-acres-inn") style="display:none;" @endif>
                <p>You can book a room on the <a href="http://www.shoreacres.com/" target="_blank">Shore Acres website</a> or call them at 802-372-8722</p>
            </div>
            <div id="north-hero-house" class="additional-info" @if($offSiteInfo['hotel_choice'] != "north-hero-house") style="display:none;" @endif>
                <p>You can book a room on the <a href="http://www.northherohouse.com/" target="_blank">North Hero House website</a> or call them at 1-888-525-3644</p>
            </div>
        @endif
    @endif
@endif
</div>
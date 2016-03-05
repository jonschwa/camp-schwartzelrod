<div class="main-page-content-block" id="lodging-info">
    <div class="row">
    <div class="col-md-12" id="lodging-info-section">
        <div id="lodging-info-content">
            <div id="lodging-header">
                <img class="header-img" src="/img/cabin-wide.jpg" />
                <p class="clarendon-headline white">Accommodations</p>
            </div>
            <a name="lodging-info"></a>
            <div id="lodging-options-container">
                <div class="col-md-6 col-sm-6 lodging-options" id="lodging-on-site">
                    <p class="clarendon-headline green">Camp Lodging</p>
                    <p class="option-detail-type grey">
                        Guests staying at camp will be free to enjoy the entire lakefront property and all the fun
                        activities we have planned. There is no need to drive anywhere and you’ll be right in the
                        center of all the action. Plus, you’ll have an easy stumble to bed after the party!
                        Breakfast and a light lunch will be provided on Saturday.
                        Visit the <a href="http://www.campabnaki.org" target="_blank">Camp Abnaki website</a>
                        for more info, photos, and a virtual tour.</p>
                    <hr>
                    <div class="option">
                        @include('pages._lodging-option',
                                 [
                                    'section_title' => 'Camp Cabin',
                                    'column'        => 'left',
                                    'icon_url'      => '/img/accommodations/cabin-icon.svg',
                                    'subtitle'      => '<p class="highway-subhead">$200/night</p>
                                                        <p class="option-subhead">Sleeps up to 10 people - fill it with friends for a really affordable
                                                        stay or keep it private</p>',
                                    'option_detail' => '<p class="option-text">Get the whole camp experience in a rustic cabin! Each cabin has 4 or 5 bunk beds in one large room
                                                        with electricity and lights. Sheets, pillows, and towels will be provided. Cabins are arranged in a
                                                        village with 6 cabins, a fire pit, and a separate (but conveniently located!) wash house. Each wash
                                                        house has multiple toilets, sinks, showers, changing areas, and plenty of hot water. The wash houses
                                                        are much nicer than you’d expect at a camp, recently renovated, and just a few steps away from your
                                                        cabin. Bring your own toiletries, but we’ll make sure there’s plenty of sunscreen and bug spray
                                                        available.</p>
                                                        <p class="txt-centered highway-subhead">Cabin booking coming soon</p>
                                                        <a href="#"><p class="txt-centered highway-subhead">CHECK OUT OUR PHOTOS OF THE CABINS</p></a>
                                                        <hr width="60%">'
                                 ]
                             )
                    </div>
                    <div class="option">
                        @include('pages._lodging-option',
                                 [
                                    'section_title' => 'BYO',
                                    'column'        => 'left',
                                    'icon_url'      => '/img/accommodations/byo-icon.svg',
                                    'subtitle'      => '<p class="highway-subhead">$20/person/night</p>
                                                        <p class="option-subhead">Bring your own tent, RV, trailer, hammock, yurt, tipi, build
                                                        a shelter in the woods…</p>',
                                    'option_detail' => '<p class="option-text">If you’re the super adventurous type, feel free to bring your own
                                                        lodging and we’ll make sure there’s a place for you to set up.
                                                        You will have access to a shared wash house and the entire camp
                                                        property. Sheets, pillows, towels, and toiletries will NOT be provided.</p>'
                                 ]
                             )
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 lodging-options" id="lodging-off-site">
                    <p class="clarendon-headline green">Off-Site Lodging</p>
                    <p class="option-detail-type grey">Guests staying off-site will be welcome to hang out on the camp property and participate in activities throughout the weekend. Food will only be provided during the Friday BBQ and Saturday reception. Transportation will not be provided, but there is plenty of parking available. We expect anyone staying off site to make safe and responsible decisions.
                    </p>
                    <hr class="lodging-header-hr">
                    <div class="option">
                        @include('pages._lodging-option',
                                 [
                                    'section_title' => 'Inns/BNBs',
                                    'column'        => 'right',
                                    'icon_url'      => '/img/accommodations/airbnb-icon.svg',
                                    'subtitle'      => '<p class="highway-subhead">$140 - $350/night</p>
                                                        <p class="option-subhead">8 minute drive from camp</p>',
                                    'option_detail' => '<p class="option-text">We recommend staying at one of the inns on North Hero Island. Both have lake view rooms, a restaurant on site, breakfast included with your stay, and lots of lakeside activities. Online booking is available on their websites:</p>
                                                        <div class="highway-subhead txt-centered">
                                                            <span>
                                                                <a href="http://www.shoreacres.com" target="_blank">
                                                                    Shore Acres Inn</a>:
                                                            </span>
                                                            <span>
                                                                 $145-200/NIGHT, NO MINIMUM STAY
                                                            </span>
                                                        </div>
                                                        <div class="highway-subhead txt-centered">
                                                            <span>
                                                                <a href="http://www.northherohouse.com/" target="_blank">
                                                                    North Hero House</a>:
                                                            </span>
                                                            <span>
                                                                 $140-350/NIGHT, TWO-NIGHT MINIMUM STAY
                                                            </span>
                                                        </div>
                                                        <br />
                                                        <p class="option-text">You could also choose one of the many other inns on neighboring islands and across the lake. We also recommend checking <a href="https://www.airbnb.com/s/North-Hero--VT--United-States?checkin=09%2F09%2F2016&checkout=09%2F11%2F2016&guests=2&zoom=10&search_by_map=true&sw_lat=44.376186833162976&sw_lng=-73.64270654933614&ne_lat=44.99466833264836&ne_lng=-72.96567407863301&ss_id=w0gv53yi" target="_blank">
                                                        AirBNB listings</a> around North Hero. Stay in Vermont only; if you stay in Plattsburgh, NY, you would have to take a ferry to camp.</p>
                                                        <hr width="60%">'
                                 ]
                             )
                    </div>
                    <div class="option">
                        @include('pages._lodging-option',
                                 [
                                    'section_title' => 'Hotel',
                                    'column'        => 'right',
                                    'icon_url'      => '/img/accommodations/hotel-icon.svg',
                                    'subtitle'      => '<p class="highway-subhead">$179/Night</p>
                                                        <p class="option-subhead">35 minute drive from camp</p>',
                                    'option_detail' => '<p class="option-text">We have secured a group rate at The Hampton Inn near Burlington for the weekend.
                                                        There is no minimum stay.</p>
                                                        <p class="highway-subhead txt-centered">BOOKING SITE COMING SOON</p><br />
                                                        <p class="option-text">Please let us know on your RSVP form that you’re interested in staying at The Hampton Inn.
                                                        If enough people want to stay there, we will lock in the group rate and email you instructions to book a room.
                                                        </p>
                                                        '
                                 ]
                             )
                    </div>
                    {{--<div class="option">--}}
                        {{--@include('pages._lodging-option',--}}
                                 {{--[--}}
                                    {{--'section_title' => 'AirBNB',--}}
                                    {{--'column'        => 'right',--}}
                                    {{--'icon_url'      => '/img/accommodations/airbnb-icon.svg',--}}
                                    {{--'subtitle'      => '<p class="highway-subhead">$40 - $1000+</p>--}}
                                                        {{--<p class="option-subhead">Home away from home. Great for families or large groups!</p>',--}}
                                    {{--'option_detail' => 'There are many vacation home rentals close to the camp. When picking--}}
                                                        {{--a place on AirBNB, we recommend looking through the photos, reading--}}
                                                        {{--reviews from previous renters, and sending questions to the host.--}}
                                                        {{--<div class="inn-links">--}}
                                                            {{--<ul>--}}
                                                                {{--<li>--}}
                                                                    {{--<a class="highway-subhead" href="https://www.airbnb.com/s/North-Hero--VT--United-States?checkin=09%2F09%2F2016&checkout=09%2F11%2F2016&guests=2&zoom=10&search_by_map=true&sw_lat=44.376186833162976&sw_lng=-73.64270654933614&ne_lat=44.99466833264836&ne_lng=-72.96567407863301&ss_id=w0gv53yi" target ="_blank">--}}
                                                                    {{--Search AirBNB listings near North Hero, VT--}}
                                                                    {{--</a>--}}
                                                                {{--</li>--}}
                                                            {{--</ul>--}}
                                                        {{--</div>--}}
                                                        {{--'--}}
                                 {{--]--}}
                             {{--)--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@extends("email-layout")
@section("content")
    <h2>Hi, {{ $user->first_name }}!</h2>
    <p>
        We are SO excited to celebrate our wedding with you and we can’t wait to share all the fun plans we have in store.
        It will be a weekend full of archery, boating, relaxation, camp games, dancing, s’mores, campfires, arts & crafts,
        delicious local food and beer, and tons of love!
    </p>
    <p>
        <strong><span style="color:#087649;">Please help us finalize the plans for our wedding weekend by double checking your RSVP</span></strong>. If you need to make changes,
        just log in at <a href="{{ URL::to('/')}}">camp.schwartzelrods.com</a> and click <strong><span style="color:#087649;">Edit RSVP.</span></strong> The most important thing
        for us to know is where you’re planning to stay.
    </p>
    <p>Here’s what we know about your RSVP so far…</p>
        <ul>
            <li>{{ $user->emailData['rsvp'] }}</li>
            @if ($user->emailData['lodging'])
                <li>You will be staying {{ $user->emailData['lodging'] }}.</li>
            @endif
            @if ($user->emailData['activities'])
                <li>You plan to participate in {{ $user->emailData['activities'] }} activities.</li>
            @endif
            @if ($user->emailData['bbq'])
                <li>You {{ $user->emailData['bbq'] }} be attending the Friday BBQ.</li>
            @endif
        </ul>
    <p>
        @if ($user->rsvp->will_attend == 1)
            If that’s all correct, then you’re done! But here’s some important information...
        @else
            Please let us know your decision by August 1st. Now here’s some important information...
        @endif
    </p>
    <p><strong><div style="font-size:1.5em;">Ride Sharing</div> <span style="color:#087649;">Rides needed from NY/NJ!</span></strong><br />
        It’s fun, it’s environmentally-friendly, and it could save you money! We have a few friends in the NY/NJ area who are
        looking for a ride to and from VT. We can vouch for every person we invited and we promise they would be excellent road
        trip buddies. Get to know your fellow campers early and <a href="https://www.facebook.com/groups/CampSchwartzelrod/">
        offer a ride/request a ride on the Facebook group!</a>
    </p>
    <p>
        <strong><span style="color:#087649;">We’re also looking for airport pick-up/drop-off volunteers!</span></strong>
        Help our west coast campers by offering a ride to/from the airport. Air travelers, please post your flight info
        in <a href="https://www.facebook.com/groups/CampSchwartzelrod/">the Facebook group</a> and we will help coordinate rides and/or shared rental cars.
    </p>
    <p>
        Note: We will not be providing any shuttles, drunk buses, trollies, limos, 16-passenger vans, party coaches, or
        private jets at any time during the weekend. We will do our best to coordinate rides between the camp and the airport.
        <strong><span style="color:#087649;">There will be no transportation offered on Saturday after the wedding.</span></strong> Designate a driver, call a car service
        (we’ll provide a list), or sober up around the campfire until the wee hours of the morning...just don’t try to walk
        back to the inns in the dark and definitely don’t drink & drive. The island roads are dark, twisty, and narrow.
    </p>
    <p><strong><div style="font-size:1.5em;">Weekend Schedule</div></strong>
        <ul>
            <li><strong><span style="color:#087649;">Camp opens:</span></strong> Friday at noon</li>
            <li><strong><span style="color:#087649;">First night campfire + BBQ:</span></strong> Friday evening</li>
            <li><strong><span style="color:#087649;">Wedding:</span></strong> Saturday around 5:00pm</li>
            <li><strong><span style="color:#087649;">Check out:</span></strong> Sunday at noon</li>
        </ul>
        We are still working on the official schedule of activities and events, which we will announce in a later email.
        If you’re staying at camp, check-in begins at noon on Friday, but you can show up anytime. As of right now, we do
        not have plans for any Sunday events or meals, but the camp property will still be open for you to enjoy through
        the afternoon. We will be leaving for our honeymoon on Sunday around noon.
    </p>
    <p>
        <strong><div style="font-size:1.5em;">Camp Cabins</div></strong>
        Based on the current RSVPs, we think each cabin will be shared by 5-8 people. If you have specific bunkmate
        requests or if you’re planning to stay in a cabin on Saturday only, please let us know ASAP. Keep an eye out
        for our next email which will give you a link to pay for your spot in a cabin. All campers must pay before arriving
        at camp.
        <br /><br />
        Unfortunately we were not able to find a place that rents bed linens so <strong><span style="color:#087649;">all campers will need to bring their own
        sheets/sleeping bag, pillows, towels, and toiletries.</span></strong> We will make sure there is plenty of bug spray and sunscreen.
        If you’re traveling from afar and bringing your own sleep stuff is a problem, please email us and we will find a
        way to make it work!
    </p>
    <p>
        <strong><div style="font-size:1.5em;">BYO/Tent Camping</div></strong>
        Looks like we will have a little tent village full of outdoorsy, adventurous friends! If your BYO plans do not
        involve a tent, please let us know ASAP. Tent campers also need to <strong><span style="color:#087649;">bring their own sheets/sleeping bag, pillows,
        towels, and toiletries.</span></strong> All tent campers will have access to the bathrooms and showers in the cabin village.
    </p>
    <p>
        <strong><div style="font-size:1.5em;">Breakfast and Lunch</div></strong>
        For people staying at camp, we will provide a light brunch (probably bagels) on Saturday morning. There will also
        be grab-and-go snacks and drinks available throughout the weekend. For people staying off site, both inns have
        restaurants and some rooms include continental breakfast. As of right now, we do not have plans for a Sunday
        brunch so everyone will be on their own.
    </p>
    <p>
        <strong><div style="font-size:1.5em;">Alcohol</div></strong>
        We will provide some beer for the weekend, but please feel free to bring your own beer, wine, liquor, or beverage
        of choice when you’re hanging out at camp. There will be lots of beer and wine served at the wedding. <strong><span style="color:#087649;">Please do not
        bring your own alcohol to the wedding</span></strong>. Vermont
        has weird liquor laws and our bartender’s liquor license could be at risk if guests bring their own booze.
        If you want to take a sneaky sip from a flask, please make sure you’re far away from the reception.
    </p>
    <p>
        <strong><div style="font-size:1.5em;">Suggested Wedding Attire</div></strong>
        We’re calling it “dressy casual” or “garden party” style. Since these things can be vague and confusing, we made
        you a handy dandy <a href="https://www.pinterest.com/redaxel/wedding-attire-for-guests/">visual style guide!</a>
        For men, we recommend a casual suit or a nice collared shirt and pants. Jacket and tie not required, but please
        don’t wear jeans or shorts. For women, we recommend cocktail dresses and sun dresses. Leave your high heels at home
        and don’t forget a light sweater in case it’s chilly in the evening. Bonus points for colorful outfits and patterns
        since we both love fun clothing!<br /><br />

        Wear whatever you want to the Friday BBQ and for the rest of the weekend! Make sure to bring camp clothes that
        you don’t mind getting dirty.
    </p>
    <p>
        <strong><div style="font-size:1.5em;">Questions?</div></strong>
        Just reply to this email, or feel free to call us (Stacey: 908-420-4006, Jon: 908-421-6493).
    </p>
    <p>
        Thank you!
    </p>
    <p>
        -Jon & Stacey
    </p>
@stop
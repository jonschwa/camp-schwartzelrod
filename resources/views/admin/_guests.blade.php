<div class="row admin-section">
    <div class="col-md-12">
        <div class="row">
            <p class="clarendon-subhead txt-centered">Guest Numbers</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p class="highway-headline txt-centered">Total</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['guests']['total'] }}</p>
            </div>
            <div class="col-sm-4">
                <p class="highway-headline txt-centered">Adults</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['guests']['adults'] }}</p>
            </div>
            <div class="col-sm-4">
                <p class="highway-headline txt-centered">Children</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['guests']['children'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="highway-headline txt-centered green">Events</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <p class="highway-headline txt-centered">Wedding</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['events']['wedding'] }}</p>
            </div>
            <div class="col-sm-3">
                <p class="highway-headline txt-centered">Friday BBQ</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['events']['friday_bbq'] }}</p>
            </div>
            <div class="col-sm-3">
                <p class="highway-headline txt-centered">Friday Activities</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['activities']['friday'] }}</p>
            </div>
            <div class="col-sm-3">
                <p class="highway-headline txt-centered">Saturday Activities</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['activities']['saturday'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="highway-headline txt-centered green">Lodging</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="highway-headline txt-centered">Cabin</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['lodging']['cabin'] }}</p>
            </div>
            <div class="col-md-4">
                <p class="highway-headline txt-centered">BYO</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['lodging']['byo'] }}</p>
            </div>
            <div class="col-md-4">
                <p class="highway-headline txt-centered">Offsite</p>
                <p class="dashboard-number">{{ $rsvps['numbers']['lodging']['offsite'] }}</p>
            </div>
        </div>
    </div>
</div>
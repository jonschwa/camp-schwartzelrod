<div class="row admin-section">
    <div class="col-md-12">
        <div class="row">
            <p class="clarendon-subhead txt-centered">RSVPS</p>
        </div>
        <div class="row">
            <div class="col-sm-3 txt-centered">
                <p class="highway-headline txt-centered">Yes</p>
                <p class="dashboard-number text-success">{{ $rsvps['yes']->count() }}</p>
                <p>Users</p>
            </div>
            <div class="col-sm-3 txt-centered">
                <p class="highway-headline txt-centered">Maybe</p>
                <p class="dashboard-number text-warning">{{ $rsvps['maybe']->count() }}</p>
                <p>Users</p>
            </div>
            <div class="col-sm-3 txt-centered">
                <p class="highway-headline txt-centered">No</p>
                <p class="dashboard-number text-danger">{{ $rsvps['no']->count() }}</p>
                <p>Users</p>
            </div>
            <div class="col-sm-3 txt-centered">
                <p class="highway-headline txt-centered">Opt Out</p>
                <p class="dashboard-number">{{ $rsvps['optOut']->count() }}</p>
                <p>Users</p>
            </div>
        </div>
    </div>
</div>
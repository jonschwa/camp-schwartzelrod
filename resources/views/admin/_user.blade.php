<div class="row admin-section">
    <div class="col-md-12">
        <div class="row">
            <p class="clarendon-subhead txt-centered">Users</p>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-3">
                <p class="highway-headline txt-centered">Claimed Code</p>
                <p class="dashboard-number">{{ $users['active']->count() }}</p>
            </div>
            <div class="col-sm-3">
                <p class="highway-headline txt-centered">Inactive</p>
                <p class="dashboard-number">{{ $users['inactive']->count() }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{--<table class="table">--}}
                    {{--<tr>--}}
                        {{--<th>Time of RSVP</th>--}}
                        {{--<th>User Name</th>--}}
                        {{--<th>RSVP</th>--}}
                        {{--<th># Adults</th>--}}
                        {{--<th># Kids</th>--}}
                        {{--<th>Lodging</th>--}}
                    {{--</tr>--}}
                    {{--@foreach($rsvps['yes'] as $rsvp)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $rsvp->created_at }}</td>--}}
                        {{--<td>{{ $rsvp->user->first_name }} {{ $rsvp->user->last_name }}</td>--}}
                        {{--<td>@include('admin._user-form-rsvp-choice')</td>--}}
                        {{--<td>{{ $rsvp->user->num_adults }}</td>--}}
                        {{--<td>{{ $rsvp->user->num_kids }}</td>--}}
                        {{--<td>@include('admin._user-form-lodging-choice')</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</table>--}}
            </div>
        </div>
    </div>
</div>
<div id="rsvp-logged-in-links">
@if(is_null($rsvp))
    <span class="highway-subhead">
        <a href="/rsvp">Complete RSVP</a>
    </span>
@else
    <span class="highway-subhead">
        <a href="/status">View RSVP</a> |  <a href="/rsvp">Edit RSVP</a>
    </span>
@endif
</div>
<div id="rsvp-subtitle">
    <p class="highway-subhead rsvp-code-ask">Please enter the code from your save the date card!</p>
    <p>Once registered, you will be able to confirm your RSVP for the wedding and other weekend events, enter guest information, and choose lodging.</p>
</div>
<form id="form-enter-code" action="#">
        <div class="form-group">
            <label class="control-label error-label" for="rsvp-code" style="display:none;"></label>
            <input type="text" class="form-control giant-input" id="rsvp-code" name="rsvp-code" placeholder="Enter your code here" @if(!is_null($code))value="{{$code}}"@endif>
        </div>
    <div id="code-response-container">
        <button type="button" class="btn btn-default button-form-enter-code-negative">Sorry, Can't make it</button>
        <button type="button" class="btn btn-default button-form-enter-code-maybe">Maybe...</button>
        <button type="button" class="btn btn-primary button-form-enter-code-positive">Yes, Count me in!</button>
        <div id="old-person-opt-out-container">
            <button type="button" class="btn btn-danger button-form-enter-code-opt-out">Help! I want to do this the old-fashioned way</button>
        </div>
    </div>
</form>
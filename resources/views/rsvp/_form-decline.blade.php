<form id="form-decline" action="#" style="display:none">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form-decline-first-name">First Name</label>
            <label class="control-label error-label" for="form-decline-first-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-decline-first-name" name="first-name" placeholder="Enter your first name">
        </div>
        <div class="form-group col-md-6">
            <label for="form-decline-last-name">Last Name</label>
            <label class="control-label error-label" for="form-decline-last-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-decline-last-name" name="last-name" placeholder="Enter your last name">
        </div>
    </div>
    <div class="form-group">
        <label for="form-decline-email">Email Address</label>
        <label class="control-label error-label" for="form-decline-email" style="display:none;"></label>
        <input type="text" class="form-control input" id="form-decline-email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <textarea rows="3" class="form-control input" id="form-decline-comment" name="comment" placeholder="Enter a message for Jon and Stacey"></textarea>
        <input type="hidden" id="form-decline-user-id">
    </div>
    <button type="button" class="btn btn-default btn-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</button>
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</form>
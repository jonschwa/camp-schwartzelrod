<form id="form-maybe" action="#" style="display:none;">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form-maybe-first-name">First Name</label>
            <label class="control-label error-label" for="form-maybe-first-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-maybe-first-name" name="first-name" placeholder="Enter your first name">
        </div>
        <div class="form-group col-md-6">
            <label for="form-maybe-last-name">Last Name</label>
            <label class="control-label error-label" for="form-maybe-last-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-maybe-last-name" name="last-name" placeholder="Enter your last name">
        </div>
    </div>
    <div class="form-group">
        <label for="form-maybe-email">Email Address</label>
        <label class="control-label error-label" for="form-maybe-email" style="display:none;"></label>
        <input type="text" class="form-control input" id="form-maybe-email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <textarea cols="3" class="form-control input" id="form-maybe-comment" name="comment" placeholder="Enter a message for Jon and Stacey"></textarea>
    </div>
    <input type="hidden" id="form-maybe-user-id">
    <button type="button" class="btn btn-default btn-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</button>
    <button type="submit" class="btn btn-default btn-primary">Submit</button>
</form>
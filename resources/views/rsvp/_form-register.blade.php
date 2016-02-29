<form id="form-register" action="#" style="display:none;">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form-register-first-name">First Name</label>
            <input type="text" class="form-control input" id="form-register-first-name" name="first-name" placeholder="Enter your first name">
        </div>
        <div class="form-group col-md-6">
            <label for="form-register-last-name">Last Name</label>
            <input type="text" class="form-control input" id="form-register-last-name" name="last-name" placeholder="Enter your last name">
        </div>
    </div>
    <div class="form-group">
        <label for="form-register-email">Email Address</label>
        <label class="control-label error-label" for="form-register-email" style="display:none;"></label>
        <input type="text" class="form-control input" id="form-register-email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="form-register-password">Password</label>
        <label class="control-label error-label" for="form-register-password" style="display:none;"></label>
        <input type="password" class="form-control input" id="form-register-password" name="password" placeholder="Pick a password!">
    </div>
    <div class="form-group">
        <label for="form-register-password-confirm">Confirm Password</label>
        <label class="control-label error-label" for="form-register-password-confirm" style="display:none;"></label>
        <input type="password" class="form-control input" id="form-register-password-confirm" name="password_confirm" placeholder="Now type it again!">
    </div>
        <input type="hidden" id="form-register-user-id">
    <div class="rsvp-form-submit-buttons">
        <button type="button" class="btn btn-default btn-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</button>
        <button type="submit" class="btn btn-primary btn-submit btn-default">Submit</button>
    </div>
</form>
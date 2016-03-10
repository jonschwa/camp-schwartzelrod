<form id="form-opt-out" action="#" style="display:none;">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form-opt-out-first-name">First Name<span class="form-required">*</span></label>
            <label class="control-label error-label" for="form-opt-out-first-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-opt-out-first-name" name="first_name" placeholder="Enter your first name">
        </div>
        <div class="form-group col-md-6">
            <label for="form-opt-out-last-name">Last Name<span class="form-required">*</span></label>
            <label class="control-label error-label" for="form-opt-out-last-name" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-opt-out-last-name" name="last_name" placeholder="Enter your last name">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="form-opt-out-email">Email Address</label>
            <label class="control-label error-label" for="form-opt-out-email" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-opt-out-email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group col-md-6">
            <label for="form-opt-out-phone">Phone Number</label>
            <label class="control-label error-label" for="form-opt-out-phone" style="display:none;"></label>
            <input type="text" class="form-control input" id="form-opt-out-phone" name="phone" placeholder="Enter your phone number">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-md-offset-3">
            <label for="form-opt-out-contact-preference">Preferred Contact Method<span class="form-required">*</span></label>
            <label class="control-label error-label" for="form-opt-out-contact-preference" style="display:none;"></label>
            <select name="contact_preference" id="form-opt-out-contact-preference" class="form-control">
                <option disabled selected value="">Please select</option>
                <option value="phone">Phone</option>
                <option value="email">Email</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <textarea cols="3" class="form-control input" id="form-opt-out-comment" name="comment" placeholder="Any other comments?"></textarea>
    </div>
    <input type="hidden" id="form-opt-out-user-id">
    <button type="button" class="btn btn-default btn-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</button>
    <button type="submit" class="btn btn-default btn-primary">Submit</button>
</form>
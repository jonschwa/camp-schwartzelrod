function hideErrors()
{
    $('#error-flash-container').fadeOut();
    $('.error-label').hide();
}

$('.button-form-enter-code-positive').click(function() {
    submitCode('yes');
});

$('.button-form-enter-code-maybe').click(function() {
    submitCode('maybe');
});

$('.button-form-enter-code-negative').click(function() {
    submitCode('no');
});

function submitCode(response)
{
    hideErrors();
    if(response == 'yes') {
        if ($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function (json) {
            //prefill the next form, hide this one, show the next
            $('#form-register-email').val(json.data.invitation.user.email);
            $('#form-register-first-name').val(json.data.invitation.user.first_name);
            $('#form-register-last-name').val(json.data.invitation.user.last_name);
            $('#form-register-user-id').val(json.data.invitation.user.id);
            $('#form-enter-code').hide();
            $('#form-register').fadeIn();
            $('#rsvp-subtitle').html('<p class="highway-subhead">AWESOME! WE CAN’T WAIT TO CELEBRATE WITH YOU!!</p>Please confirm your information and set a password.');

        }).error(function (json) {
            showErrorMessage(json.responseJSON.message);
        });
    }
    else if(response == 'maybe') {
        if($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function(json) {
            console.log(json.data.invitation.user.id);
            //prefill the next form, hide this one, show the next
            $('#form-maybe-email').val(json.data.invitation.user.email);
            $('#form-maybe-first-name').val(json.data.invitation.user.first_name);
            $('#form-maybe-last-name').val(json.data.invitation.user.last_name);
            $('#form-maybe-user-id').val(json.data.invitation.user.id);
            $('#form-maybe-message').val(json.data.invitation.user.id);
            $('#form-enter-code').hide();
            $('#form-maybe').fadeIn();
            $('#rsvp-subtitle').html('<p class="highway-subhead">We get it! No pressure!</p>Please confirm your contact information so we can get in touch when the RSVP deadline rolls around (that\’s August 1st, by the way). You may come back to this website and enter your code to change your RSVP at any time.');

        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
        });
    }
    else if(response == 'no') {
        if($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function(json) {
            //prefill the next form, hide this one, show the next
            //@todo make this less janky, use waypoints
            $('#form-decline-user-id').val(json.data.invitation.user.id);
            $('#form-decline-message').val(json.data.invitation.user.id);
            $('#form-enter-code').hide();
            $('#form-decline').fadeIn();
            $('#rsvp-subtitle').html('<p class="highway-subhead">We will miss you!</p>Feel free to write us a message below. You may come back to this website and enter your code to change your RSVP at any time (deadline is August 1st).');
        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
        });
    }
}

$('#form-decline').submit(function(event) {
    hideErrors();
    event.preventDefault();
    $.ajax({
        url: "/api/users/" + $('#form-decline-user-id').val() + '/rsvp/',
        method: "POST",
        data: {
            "comment" : $('#form-decline-comment').val(),
            "will_attend" : 0,
            "num_guests" : 0
        }
    }).success(function(json) {
        $('#form-decline').hide();
        $('#rsvp-not-coming').fadeIn();

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
    });
});

$('#form-maybe').submit(function(event) {
    hideErrors();
    event.preventDefault();
    $.ajax({
        url: "/api/users/" + $('#form-maybe-user-id').val() + '/rsvp/',
        method: "POST",
        data: {
            "comment" : $('#form-maybe-comment').val(),
            "will_attend" : -1,
            "num_guests" : 0
        }
    }).success(function(json) {
        $('#form-maybe').hide();
        $('#rsvp-not-coming').fadeIn();

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
    });
});

$('#form-register').submit(function(event) {
    hideErrors();
    //@todo show loading gif

    event.preventDefault();
    //@todo some FE validation?

    $.ajax({
        url: "/api/users/" + $('#form-register-user-id').val() + '/activate',
        method: "POST",
        data: {
            "first_name" : $('#form-register-first-name').val(),
            "last_name" : $('#form-register-last-name').val(),
            "email" : $('#form-register-email').val(),
            "password" : $('#form-register-password').val(),
            "password_confirm" : $('#form-register-password-confirm').val()
        }
    }).success(function(json) {
        console.log(json);
        //@todo store local user object?
        //@todo redirect to logged in homepage w/ guests
        window.location.href = "/rsvp";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);

        //@todo highlight validation errs and show messages
        showFormErrors(json.responseJSON.errors, $('#form-register'));

        $('#error-flash-container').fadeIn();
    });
});

$('.btn-back').click(function(event) {
    event.preventDefault();
    defaultRsvpSubtitle();
    $('#form-register').fadeOut();
    $('#form-maybe').fadeOut();
    $('#form-decline').fadeOut();
    $('#form-enter-code').fadeIn();
});

function defaultRsvpSubtitle()
{
    $('#rsvp-subtitle').html('Got a code? It\'s your invitation! Enter it to start camp registration:');
}
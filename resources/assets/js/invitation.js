function hideErrors()
{
    $('#error-flash-container').fadeOut();
    $('#form-enter-code').find('.form-group').removeClass('has-error');
    $('.error-label').hide();
}

$('#form-enter-code').bind("keypress", function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
    }
});

$('.button-form-enter-code-positive').click(function() {
    submitCode('yes');
});

$('.button-form-enter-code-maybe').click(function() {
    submitCode('maybe');
});

$('.button-form-enter-code-negative').click(function() {
    submitCode('no');
});

$('.button-form-enter-code-opt-out').click(function() {
    submitCode('opt-out');
});

function submitCode(response)
{
    hideErrors();
    if(response == 'yes') {
        if ($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
            showInvitationCodeError();
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function (json) {
            changeRsvpTitle('yes');
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
            showInvitationCodeError();
        });
    }
    else if(response == 'maybe') {
        if($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
            showInvitationCodeError();
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function(json) {
            changeRsvpTitle('maybe');
            console.log(json.data.invitation.user.id);
            //prefill the next form, hide this one, show the next
            $('#form-maybe-email').val(json.data.invitation.user.email);
            $('#form-maybe-first-name').val(json.data.invitation.user.first_name);
            $('#form-maybe-last-name').val(json.data.invitation.user.last_name);
            $('#form-maybe-user-id').val(json.data.invitation.user.id);
            //$('#form-maybe-message').val(json.data.invitation.user.id);
            $('#form-enter-code').hide();
            $('#form-maybe').fadeIn();
            $('#rsvp-subtitle').html('<p class="highway-subhead">We get it! No pressure!</p>Please confirm your contact information so we can get in touch when the RSVP deadline rolls around (that\’s August 1st, by the way). You may come back to this website ​anytime​ and enter your code to change your RSVP.');

        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
            showInvitationCodeError();
        });
    }
    else if(response == 'no') {
        if($('#rsvp-code').val() == '') {
            showErrorMessage('You didn\'t enter a code!');
            showInvitationCodeError();
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function(json) {
            changeRsvpTitle('no');
            //prefill the next form, hide this one, show the next
            $('#form-decline-user-id').val(json.data.invitation.user.id);
            $('#form-decline-email').val(json.data.invitation.user.email);
            $('#form-decline-first-name').val(json.data.invitation.user.first_name);
            $('#form-decline-last-name').val(json.data.invitation.user.last_name);
            $('#form-enter-code').hide();
            $('#form-decline').fadeIn();
            $('#rsvp-subtitle').html('<p class="highway-subhead">We will miss you!</p>Please confirm your contact information just in case we need to get in touch with you. You may come back to this website anytime and enter your code to change your RSVP (deadline is August 1st).');
        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
            showInvitationCodeError();
        });
    }
    else if(response == 'opt-out') {
        if($('#rsvp-code').val() == '') {
            showErrorMessage('Please enter the code from your save the date!');
            showInvitationCodeError();
        }
        $.ajax({
            url: "/api/invitations/code/" + $('#rsvp-code').val()
        }).success(function(json) {
            //prefill the next form, hide this one, show the next
            $('#form-opt-out-email').val(json.data.invitation.user.email);
            $('#form-opt-out-first-name').val(json.data.invitation.user.first_name);
            $('#form-opt-out-last-name').val(json.data.invitation.user.last_name);
            $('#form-opt-out-user-id').val(json.data.invitation.user.id);
            $('#form-opt-out-phone').val(json.data.invitation.user.phone);
            $('#form-enter-code').hide();
            $('#form-opt-out').fadeIn();
            $('#rsvp-subtitle').html('<div class="opt-out-form-text">' +
                                     '<p class="highway-subhead">Are you sure you want to opt out of our awesome website?</p>' +
                                     '<p>No big deal... we only slaved over it for a few months!</p>'+
                                     '<p>If all this newfangled internet technology is really too much for you, please fill out this form and we will ​contact​ you within ​two​ weeks</p>'+
                                     '</div>'
                   );
        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
            showInvitationCodeError();
        });
    }
}

$('#form-decline').submit(function(event) {
    hideErrors();
    //disable buttons
    var btns = $(this).find('.btn');
    btns.addClass('disabled');

    event.preventDefault();
    $.ajax({
        url: "/api/users/" + $('#form-decline-user-id').val() + '/rsvp/',
        method: "POST",
        data: {
            "comment" : $('#form-decline-comment').val(),
            "first_name" : $('#form-decline-first-name').val(),
            "last_name" : $('#form-decline-last-name').val(),
            "email" : $('#form-decline-email').val(),
            "with_user_update" : 1,
            "will_attend" : 0,
            "num_guests" : 0
        }
    }).success(function(json) {
        $('#form-decline').hide();
        $('#rsvp-subtitle').hide();
        $('#rsvp-not-coming').fadeIn();

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        btns.removeClass('disabled');
        showFormErrors(json.responseJSON.errors, $('#form-decline'));
    });
});

$('#form-maybe').submit(function(event) {
    hideErrors();
    //disable buttons
    var btns = $(this).find('.btn');
    btns.addClass('disabled');

    event.preventDefault();
    $.ajax({
        url: "/api/users/" + $('#form-maybe-user-id').val() + '/rsvp/',
        method: "POST",
        data: {
            "first_name" : $('#form-maybe-first-name').val(),
            "last_name" : $('#form-maybe-last-name').val(),
            "email" : $('#form-maybe-email').val(),
            "comment" : $('#form-maybe-comment').val(),
            "with_user_update" : 1,
            "will_attend" : -1,
            "num_guests" : 0
        }
    }).success(function(json) {
        $('#form-maybe').hide();
        $('#rsvp-subtitle').hide();
        $('#rsvp-maybe-coming').fadeIn();

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        btns.removeClass('disabled');
        showFormErrors(json.responseJSON.errors, $('#form-maybe'));
    });
});


$('#form-opt-out').submit(function(event) {
    hideErrors();
    //disable buttons
    var btns = $(this).find('.btn');
    btns.addClass('disabled');

    event.preventDefault();
    $.ajax({
        url: "/api/users/" + $('#form-opt-out-user-id').val() + '/rsvp/',
        method: "POST",
        data: {
            "first_name" : $('#form-opt-out-first-name').val(),
            "last_name" : $('#form-opt-out-last-name').val(),
            "email" : $('#form-opt-out-email').val(),
            "phone" : $('#form-opt-out-phone').val(),
            "contact_preference" : $('#form-opt-out-contact-preference').val(),
            "comment" : $('#form-opt-out-comment').val(),
            "will_attend" : -2, //@todo - build a thing for us to check on opt-out guests
            "with_user_update" : 1,
            "num_guests" : 0
        }
    }).success(function(json) {
        console.log(json);
        var prefContact = json.data.user.contact_preference;
        $('#preferred-contact-method').html(prefContact);
        $('#form-opt-out').hide();
        $('#rsvp-subtitle').hide();
        $('#rsvp-opted-out').fadeIn();

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        btns.removeClass('disabled');

        showFormErrors(json.responseJSON.errors, $('#form-opt-out'));
    });
});

$('#form-register').submit(function(event) {

    //disable buttons
    var btns = $(this).find('.btn');
    btns.addClass('disabled');

    //@todo spinner
    //var submitBtn = $(this).find('.btn-submit');


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
        btns.removeClass('disabled');
    });
});

$('.btn-back').click(function(event) {
    if($(this).hasClass('disabled') === false) {
        event.preventDefault();
        defaultRsvpSubtitle();
        changeRsvpTitle('default');
        $('#form-register').fadeOut();
        $('#form-maybe').fadeOut();
        $('#form-decline').fadeOut();
        $('#form-opt-out').fadeOut();
        $('#form-enter-code').fadeIn();
    }
});

function defaultRsvpSubtitle()
{
    $('#rsvp-subtitle').html('<p class="highway-subhead rsvp-code-ask">Please enter the code from your save the date card!</p> <p>Once registered, you will be able to confirm your RSVP for the wedding and other weekend events, enter guest information, and choose lodging.</p>');
}

function changeRsvpTitle(type) {
    var titles = {
        'yes'     : 'Your RSVP: Yes',
        'no'      : 'Your RSVP: No',
        'maybe'   : 'Your RSVP: Maybe',
        'default' : 'RSVP'
    };
    $('#rsvp-section-title').html(titles[type]);
}
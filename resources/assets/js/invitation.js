$('.button-form-enter-code-positive').click(function() {
    if($('#rsvp-code').val() == '') {
        showErrorMessage('You didn\'t enter a code!');
    }
    $.ajax({
        url: "/api/invitations/code/" + $('#rsvp-code').val()
    }).success(function(json) {
        //prefill the next form, hide this one, show the next
        //@todo make this less janky, use waypoints
        $('#form-enter-code').fadeOut();
        $('#form-register-email').val(json.data.invitation.user.email);
        $('#form-register-first-name').val(json.data.invitation.user.first_name);
        $('#form-register-last-name').val(json.data.invitation.user.last_name);
        $('#form-register-user-id').val(json.data.invitation.user.id);
        $('#form-register').fadeIn();
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
    });
});

$('.button-form-enter-code-negative').click(function() {
    if($('#rsvp-code').val() == '') {
        showErrorMessage('You didn\'t enter a code!');
    }
    $.ajax({
        url: "/api/invitations/code/" + $('#rsvp-code').val()
    }).success(function(json) {
        //prefill the next form, hide this one, show the next
        //@todo make this less janky, use waypoints
        $('#form-enter-code').fadeOut();
        $('#form-decline-user-id').val(json.data.invitation.user.id);
        $('#form-decline-message').val(json.data.invitation.user.id);
        $('#form-decline').fadeIn();
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
    });
});

$('#form-decline').submit(function(event) {
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
        //redirect to the sorry you won't make it page!
        window.location.href = "/bummer";

    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
    });
});

$('#form-register').submit(function(event) {
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
        window.location.href = "/status";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        //@todo highlight validation errs and show messages
        $('#error-flash-container').fadeIn();
    });
});
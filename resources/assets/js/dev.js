$('#form-enter-code').submit(function(event) {
    event.preventDefault();

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
        console.log(json.responseJSON);
        alert(json.responseJSON.message);
    });

});

$('#form-register').submit(function(event) {
    //@todo show loading gif

    event.preventDefault();
    //@todo some FE validation?

    $.ajax({
        url: "/api/users/",
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


    }).error(function(json) {
        console.log(json.responseJSON);
        alert(json.responseJSON.message);
    });

});
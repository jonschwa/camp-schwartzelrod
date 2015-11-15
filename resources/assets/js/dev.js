function showErrorMessage(message) {
    $('#error-flash-message').html(message);
    $('#error-flash-container').fadeIn();
    return false;
}

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
        window.location.href = "/home";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        //@todo highlight validation errs and show messages
        $('#error-flash-container').fadeIn();
    });
});

$('#form-login').submit(function(event) {
    //@todo show loading gif

    event.preventDefault();
    //@todo some FE validation?

    $.ajax({
        url: "/api/users/login",
        method: "POST",
        data: {
            "email" : $('#form-login-email').val(),
            "password" : $('#form-login-password').val(),
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

/**
 * RSVP GUEST THINGS
 */

$('.button-rsvp-add-guest').on('click', function() {
    var clone = $('.guest-rsvp-container.blank').clone().removeClass('blank').appendTo('#rsvp-guests-container');
    clone.fadeIn();
});

$('#rsvp-guests-container').on('click', '.button-rsvp-remove-guest', function(){
    var guestDiv = $(this).closest('.guest-rsvp-container');
    guestDiv.fadeOut().remove();
});

function UserGuest (params) {
    this.guestId = params.guestId;
    this.isAdult = params.isAdult;
    this.firstName = params.firstName;
    this.lastName = params.lastName;
    this.isStaying = params.isStaying;
    this.archery = params.archery;
    this.swimming = params.swimming;
    this.boating = params.boating,
    this.bbq = params.bbq;
    this.sports = params.sports;
    this.artsAndCrafts = params.artsAndCrafts;
    this.goodTime = params.goodTime
}

$('#btn-user-guest-submit').on('click', function() {
    var guestFormData = $.find('.rsvp-guest-interests');
    var userId = $('#userid').val();
    var userGuests = [];

    $.each(guestFormData, function(guestData) {
        params = {
            guestId : $(this).find("input[name='guestid']").val(),
            firstName : $(this).find("input[name='first-name']").val(),
            lastName : $(this).find("input[name='last-name']").val(),
            isAdult : $(this).find("input[name='is-adult']").is(':checked') ? 1 : 0,
            isStaying : $(this).find("input[name='is-staying']").is(':checked') ? 1 : 0,
            archery : $(this).find("input[name='interested-archery']").is(':checked') ? 1 : 0,
            swimming : $(this).find("input[name='interested-swimming']").is(':checked') ? 1 : 0,
            bbq : $(this).find("input[name='interested-bbq']").is(':checked') ? 1 : 0,
            boating : $(this).find("input[name='interested-boating']").is(':checked') ? 1 : 0,
            goodTime : $(this).find("input[name='interested-good-time']").is(':checked') ? 1 : 0,
            sports : $(this).find("input[name='interested-sports']").is(':checked') ? 1 : 0,
            artsAndCrafts : $(this).find("input[name='interested-arts-and-crafts']").is(':checked') ? 1 : 0
        };

        if($(this).parent().hasClass('blank') === false) {
            var guest = new UserGuest(params);
            userGuests.push(guest);
        }
        console.log(userGuests);
    });

    $.ajax({
        url: "/api/users/" + userId + "/guests",
        method: "POST",
        data: {
            "guests" : userGuests
        }
    }).success(function(json) {
        console.log(json);

        window.alert('that went well!');
        //window.location.href = "/status";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        //@todo highlight validation errs and show messages
        $('#error-flash-container').fadeIn();
    });
});

$('#form-guest-register').submit(function(event) {
    //@todo show loading gif

    event.preventDefault();
    //@todo some FE validation?

    //create an array of all the user data


    $.ajax({
        url: "/api/users/" +$('#form-user-id').val() + "/guests",
        method: "POST",
        data: {
            //"email" : $('#form-login-email').val(),
            //"password" : $('#form-login-password').val(),
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
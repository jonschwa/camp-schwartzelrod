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

$('#rsvp-guests-container').on('click', '.activityIcon', function(e) {
    var attrName = e.target.getAttribute('input-name');
    var active;
    var checkBox = $(this).closest('.rsvp-guest-interests').find("input[name='"+attrName+"']");
    if($(checkBox).prop('checked') === false) {
        $(checkBox).prop('checked', false);
        active = false;
    }
    else {
        $(checkBox).prop('checked', true);
        active = true;
    }
    toggleInterestColor(active, e.target);
});

function UserGuest (params) {
    this.guestId = params.guestId;
    this.isAdult = params.isAdult;
    this.firstName = params.firstName;
    this.lastName = params.lastName;
    this.isStaying = params.isStaying;
    this.cabinAdventureLevel = params.cabinAdventureLevel;
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
    var userGuests = generateRequestBody(guestFormData);

    $.ajax({
        url: "/api/users/" + userId + "/guests",
        method: "POST",
        data: {
            "guests" : userGuests
        }
    }).success(function(json) {
        console.log(json);

        console.log('guests updated!');
        //create or update the rsvp record
        $.ajax({
            url: "/api/users/" + userId + '/rsvp/',
            method: "POST",
            data: {
                "will_attend" : 1,
                "num_guests" : userGuests.length
            }
        }).success(function(json) {
            console.log('rsvp updated!');
            //redirect to the status page!
            window.location.href = "/status";

        }).error(function(json) {
            showErrorMessage(json.responseJSON.message);
        });

        //window.location.href = "/status";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        //@todo highlight validation errs and show messages
        $('#error-flash-container').fadeIn();
    });
});

function generateRequestBody(guestFormData) {
    var userGuests = [];
    $.each(guestFormData, function(guestData) {
        var params = {
            guestId : $(this).find("input[name='guestid']").val(),
            firstName : $(this).find("input[name='first-name']").val(),
            lastName : $(this).find("input[name='last-name']").val(),
            isAdult : $(this).find("input[name='is-adult']").is(':checked') ? 1 : 0,
            isStaying : $(this).find("input[name='is-staying']").is(':checked') ? 1 : 0,
            cabinAdventureLevel : $(this).find("input[name='cabin-adventure-level']").val(),
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

    return userGuests;
}

$('#rsvp-guests-container').on('click', '.activityIcon', function(e) {
    var attrName = e.target.getAttribute('input-name');
    var active;
    var checkBox = $(this).closest('.rsvp-guest-interests').find("input[name='"+attrName+"']");
    if($(checkBox).is(':checked') === true) {
        $(checkBox).prop('checked', false);
        active = false;
    }
    else {
        $(checkBox).prop('checked', true);
        active = true;
    }
    toggleInterestColor(active, e.target);
});

$('#rsvp-guests-container').on('click', '.cb-is-staying', function(e) {
    if($(this).is(':checked')) {
        $(this).closest('.rsvp-guest-interests').find('.cabin-details').show();
    }
    else {
        $(this).closest('.rsvp-guest-interests').find('.cabin-details').hide();
    }
});

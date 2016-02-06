/**
 * RSVP GUEST THINGS
 */

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
    this.boating = params.boating;
    //this.bbq = params.bbq;
    this.artsAndCrafts = params.artsAndCrafts;
    this.soccer = params.soccer;
    this.tennis = params.tennis;
    this.basketball = params.basketball;
    this.baseball = params.baseball;
    this.volleyball = params.volleyball;
    this.football = params.football;
    this.frisbee = params.frisbee;
    this.kickball = params.kickball;
    this.ctf = params.ctf;
    this.scavengerHunt = params.scavengerHunt;
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
            isAdult : $(this).find("input[name='is-child']").is(':checked') ? 0 : 1,
            isStaying : $(this).find("input[name='is-staying']").is(':checked') ? 1 : 0,
            cabinAdventureLevel : $(this).find("input[name='cabin-adventure-level']").val(),
            archery : $(this).find("input[name='interested-archery']").is(':checked') ? 1 : 0,
            swimming : $(this).find("input[name='interested-swimming']").is(':checked') ? 1 : 0,
            //bbq : $(this).find("input[name='interested-bbq']").is(':checked') ? 1 : 0,
            boating : $(this).find("input[name='interested-boating']").is(':checked') ? 1 : 0,
            artsAndCrafts : $(this).find("input[name='interested-arts-and-crafts']").is(':checked') ? 1 : 0,
            soccer : $(this).find("input[name='interested-soccer']").is(':checked') ? 1 : 0,
            tennis : $(this).find("input[name='interested-tennis']").is(':checked') ? 1 : 0,
            basketball : $(this).find("input[name='interested-basketball']").is(':checked') ? 1 : 0,
            baseball : $(this).find("input[name='interested-baseball']").is(':checked') ? 1 : 0,
            volleyball : $(this).find("input[name='interested-volleyball']").is(':checked') ? 1 : 0,
            football : $(this).find("input[name='interested-football']").is(':checked') ? 1 : 0,
            frisbee : $(this).find("input[name='interested-frisbee']").is(':checked') ? 1 : 0,
            kickball : $(this).find("input[name='interested-kickball']").is(':checked') ? 1 : 0,
            ctf : $(this).find("input[name='interested-ctf']").is(':checked') ? 1 : 0,
            scavengerHunt : $(this).find("input[name='interested-scavenger-hunt']").is(':checked') ? 1 : 0
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
    var checkable = false;
    var count = $(this).closest('.rsvp-guest-interests').find('.activity-checkbox:checkbox:checked');
    if(count.length < 3) {
        checkable = true;
    }

    var checkBox = $(this).closest('.rsvp-guest-interests').find("input[name='"+attrName+"']");
    if($(checkBox).is(':checked') === true) {
        $(checkBox).prop('checked', false);
        active = false;
    }
    else {
        if(checkable) {
            $(checkBox).prop('checked', true);
            active = true;
        }
    }
    toggleInterestColor(active, e.target);
});

$('#rsvp-guests-container').on('click', '.cb-is-staying', function(e) {
    if($(this).is(':checked')) {
        $(this).closest('.rsvp-guest-interests').find('.cabin-details').fadeIn();
    }
    else {
        $(this).closest('.rsvp-guest-interests').find('.cabin-details').hide();
    }
});

$('#rsvp-guests-container').on('click', '.cal-option-container', function(e) {
    $(this).siblings( ".selected").removeClass('selected');
    $(this).addClass('selected');
    var level = $(this).attr('level');
    $(this).closest(".cabin-adventure-level").find("input[name='cabin-adventure-level']").val(level)

});


$('#rsvp-guests-container').on('click', '.button-rsvp-remove-guest', function(){
    //hide the button if the number of guests is higher than what the user is allowed
    var maxGuests = $('#maxguests').val();
    var numGuests = $('.guest-rsvp-container').length;

    var guestDiv = $(this).closest('.guest-rsvp-container');
    guestDiv.fadeOut().remove();

    if(maxGuests <= numGuests)
    {
        if($('#add-guest-button').is(':visible')) {
            //do nothing
        }
        else {
            $('#add-guest-button').show();
        }
    }
});

$('#button-rsvp-add-guest').on('click', function(e){
    var maxGuests = $('#maxguests').val();
    var numGuests = $('.guest-rsvp-container').length;

    //console.log('numGuests: ' + numGuests + ' maxGuests: ' + maxGuests);
    if(numGuests == maxGuests) {
        $('#add-guest-button').hide();
    }

    var clone = $('.guest-rsvp-container.blank').clone().removeClass('blank').appendTo('#rsvp-guests-container');
    var activities = clone.find('')
    clone.fadeIn();
});
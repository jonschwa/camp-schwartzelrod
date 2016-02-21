/**
 * RSVP GUEST THINGS
 */

function UserGuest (params) {
    this.guestId = params.guestId;
    this.isAdult = params.isAdult;
    this.childAge = params.childAge;
    this.firstName = params.firstName;
    this.lastName = params.lastName;
    this.isStaying = params.isStaying;
    this.fridayBBQ = params.fridayBBQ;
    this.friCampActivities = params.friCampActivities;
    this.satCampActivities = params.satCampActivities;
    this.weddingAttend = params.weddingAttend;
    this.cabinAdventureLevel = params.cabinAdventureLevel;
    this.desiredBunkMates = params.desiredBunkMates;
    this.archery = params.archery;
    this.swimming = params.swimming;
    this.boating = params.boating;
    this.artsAndCrafts = params.artsAndCrafts;
    this.soccer = params.soccer;
    this.tennis = params.tennis;
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

    //console.log(userGuests);
    $.ajax({
        url: "/api/users/" + userId + "/guests",
        method: "POST",
        data: {
            "guests" : userGuests
        }
    }).success(function(json) {
        console.log(json);

        //console.log('guests updated!');
        //create or update the rsvp record
        $.ajax({
            url: "/api/users/" + userId + '/rsvp/',
            method: "POST",
            data: {
                "will_attend" : 1,
                "num_guests" : userGuests.length
            }
        }).success(function(json) {
            //console.log('rsvp updated!');
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

    var lodgingInfo = getLodgingInfo();
    //console.log(lodgingInfo);

    //console.log(lodgingInfo.isStaying);
    //console.log(lodgingInfo.cabinAdventureLevel);

    $.each(guestFormData, function(guestData) {
        var params = {
            guestId : $(this).find("input[name='guestid']").val(),
            firstName : $(this).find("input[name='first-name']").val(),
            lastName : $(this).find("input[name='last-name']").val(),
            isAdult : $(this).find("input[name='is-child']").is(':checked') ? 0 : 1,
            childAge : $(this).find("input[name='child-age']").val(),
            isStaying : lodgingInfo.isStaying,
            fridayBBQ : $(this).find("input[name='friday-bbq']").is(':checked') ? 1 : 0,
            friCampActivities : $(this).find("input[name='fri-camp-activities']").is(':checked') ? 1 : 0,
            satCampActivities : $(this).find("input[name='sat-camp-activities']").is(':checked') ? 1 : 0,
            weddingAttend : $(this).find("input[name='wedding-attend']").is(':checked') ? 1 : 0,
            cabinAdventureLevel : parseInt(lodgingInfo.cabinAdventureLevel),
            desiredBunkMates : lodgingInfo.desiredBunkMates,
            archery : $(this).find("input[name='interested-archery']").is(':checked') ? 1 : 0,
            swimming : $(this).find("input[name='interested-swimming']").is(':checked') ? 1 : 0,
            boating : $(this).find("input[name='interested-boating']").is(':checked') ? 1 : 0,
            artsAndCrafts : $(this).find("input[name='interested-arts-and-crafts']").is(':checked') ? 1 : 0,
            soccer : $(this).find("input[name='interested-soccer']").is(':checked') ? 1 : 0,
            tennis : $(this).find("input[name='interested-tennis']").is(':checked') ? 1 : 0,
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
        //console.log(userGuests);
    });

    return userGuests;
}

function getLodgingInfo()
{
    var lodgingForm = $.find('#lodging-selection-form');
    var isStaying = $('input[class=radio-is-staying]:checked', lodgingForm).val();
    var hotelChoice = null;
    var bunkMates = null;
    var cabinAdventureLevel = 0;

    if(isStaying != 'true') {
        isStaying = 0;
        hotelChoice = $('#offsite-lodging-options-select').find(":selected").val();
    }
    else {
        isStaying = 1;
        cabinAdventureLevel = $('input[name=cabin-adventure-level]', lodgingForm).val();
        bunkMates = $('textarea[name=desired-bunkmates]', lodgingForm).val();
    }

    return {
        isStaying : isStaying,
        cabinAdventureLevel : cabinAdventureLevel,
        desiredBunkMates : bunkMates,
        hotelChoice : hotelChoice
    };
}

$('#rsvp-guests-container').on('click', '.activityIcon', function(e) {
    var activityOptionParent = e.target.closest('.activityIcon');
    var attrName = activityOptionParent.getAttribute('input-name');
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
        else {
            $(this).closest('.rsvp-guest-interests')
                .find('.top3-instructions')
                .css('color', 'red')
                .effect( "bounce", {times:4}, 1000, function() {
                    $(this).css('color', 'black');
            });
        }
    }
    toggleInterestColor(active, activityOptionParent);
});

$('#rsvp-guests-container').on('click', '.cb-activities', function(e) {
    var friActivities = $(this).closest('.guest-form-row').find('.friday-activities').is(':checked');
    var satActivities = $(this).closest('.guest-form-row').find('.saturday-activities').is(':checked');

    if(friActivities || satActivities) {
        $(this).closest('.rsvp-guest-interests').find('.activity-selection-form').fadeIn();
    }
    else {
        $(this).closest('.rsvp-guest-interests').find('.activity-selection-form').hide();
    }


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

$('#rsvp-guests-container').on('click', 'input[name="is-child"]', function(){
    //show the age form is is-child is selected
    if($(this).is(':checked')) {
        $(this).closest('.row').find('.child-age-form').fadeIn('fast');
    }
    else {
        $(this).closest('.row').find('.child-age-form').hide();
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

$('#lodging-selection-form').on('click', '.radio-is-staying', function(e) {
    if($(this).val() === 'true') {
        $('#lodging-selection-form').find('.offsite-details').hide();
        $('#lodging-selection-form').find('.cabin-details').fadeIn();
    }
    else {
        $('#lodging-selection-form').find('.cabin-details').hide();
        $('#lodging-selection-form').find('.offsite-details').fadeIn();
    }
});

$('#lodging-selection-form').on('click', '.cal-option-container', function(e) {
    $(this).siblings( ".selected").removeClass('selected');
    $(this).addClass('selected');
    var level = $(this).attr('level');
    $(this).closest(".cabin-adventure-level").find("input[name='cabin-adventure-level']").val(level)
});

$('#lodging-selection-form').on('change', '.offsite-lodging-options-select', function(e) {
    var selection = $(this).val();
    var additionalInfo = '';

    if(selection == 'hampton-inn') {
        additionalInfo += '<p>Please do not book a room yet.</p> ' +
            '<p>If enough people want to stay there, we will lock in the group rate and email you instructions to book a room.</p>'
    }

    $(this).closest('.offsite-details').find('.offsite-lodging-feedback').html(additionalInfo);
});

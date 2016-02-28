function scrollToAnchor(aid, speed){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},speed);
}

function checkMainPage()
{
    var mainPage = $('#mainpage').attr('isMainPage');
    if(mainPage)
    {
        return true;
    }
    return false;
}

$(window).on("scroll", function() {
    //var scrollPos = $(window).scrollTop();
    //if (scrollPos >= 40) {
    //    toggleNavForm('hide');
    //    hideNavErrors();
    //}
    //else if (scrollPos <= 0) {
    //    toggleNavForm('show');
    //}


    var ourStoryOffset = $('#our-story-anchor').offset().top -25;
    var weddingInfoOffset = $('#wedding-info-anchor').offset().top -15;
    var vtInfoOffset = $('#vt-info-anchor').offset().top -15;
    var lodgingInfoOffset = $('#lodging-info-anchor').offset().top -15;
    var rsvpInfoOffset = $('#rsvp-info-anchor').offset().top -15;

    if ($(window).scrollTop() > ourStoryOffset && $(window).scrollTop() < weddingInfoOffset) {
        if($('#nav-our-story-link').hasClass('active') == false) {
            $('#nav-our-story-link').addClass('active');
        }
    }
    else {
        $('#nav-our-story-link').removeClass('active');
    }

    if ($(window).scrollTop() > weddingInfoOffset && $(window).scrollTop() < vtInfoOffset) {
        if($('#nav-wedding-info-link').hasClass('active') == false) {
            $('#nav-wedding-info-link').addClass('active');
        }
    }
    else {
        $('#nav-wedding-info-link').removeClass('active');
    }

    if ($(window).scrollTop() > vtInfoOffset && $(window).scrollTop() < lodgingInfoOffset) {
        if($('#nav-vt-info-link').hasClass('active') == false) {
            $('#nav-vt-info-link').addClass('active');
        }
    }
    else {
        $('#nav-vt-info-link').removeClass('active');
    }

    if ($(window).scrollTop() > lodgingInfoOffset && $(window).scrollTop() < rsvpInfoOffset) {
        if($('#nav-lodging-info-link').hasClass('active') == false) {
            $('#nav-lodging-info-link').addClass('active');
        }
    }
    else {
        $('#nav-lodging-info-link').removeClass('active');
    }

    if ($(window).scrollTop() > rsvpInfoOffset) {
        if($('#nav-rsvp-link').hasClass('active') == false) {
            $('#nav-rsvp-link').addClass('active');
        }
    }
    else {
        $('#nav-rsvp-link').removeClass('active');
    }
});

function clearActiveNav() {

}

$('#login-form-toggle').on('click', function() {
    hideNavErrors();
    $('.navbar-toggle').click();
    scrollToAnchor('page-top', 'fast');
    toggleNavForm('show');
});

function toggleNavForm(display)
{
    var navForm = $('#form-nav-login');
    if(display) {
        if(display == 'hide') {
            navForm.addClass('closed');
        }
        else {
            navForm.removeClass('closed');
        }
        return false;
    }

    if (navForm.hasClass('closed')) {
        navForm.removeClass('closed');
    }
    else {
        navForm.addClass('closed');
    }
}

$('#nav-our-story-link').on('click', function(e){
   if (checkMainPage()) {
       e.preventDefault();
       $(this).blur();
   }
   $('.navbar-toggle').click();
   scrollToAnchor('our-story', 'slow');
});

$('#nav-wedding-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
        $(this).blur();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('wedding-info', 'slow');
});

$('#nav-lodging-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
        $(this).blur();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('lodging-info', 'slow');
});

$('#nav-vt-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
        $(this).blur();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('vt-info', 'slow');
});
$('#nav-rsvp-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
        $(this).blur();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('rsvp', 'slow');
});
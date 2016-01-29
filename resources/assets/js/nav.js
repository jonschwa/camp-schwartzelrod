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
    var scrollPos = $(window).scrollTop();
    if (scrollPos >= 40) {
        toggleNavForm('hide');
        hideNavErrors();
    }
    else if (scrollPos <= 0) {
        toggleNavForm('show');
    }
});

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
   }
   $('.navbar-toggle').click();
   scrollToAnchor('our-story', 'slow');
});

$('#nav-wedding-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('wedding-info', 'slow');
});

$('#nav-lodging-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('lodging-info', 'slow');
});

$('#nav-vt-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('vt-info', 'slow');
});
$('#nav-rsvp-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    $('.navbar-toggle').click();
    scrollToAnchor('rsvp', 'slow');
});
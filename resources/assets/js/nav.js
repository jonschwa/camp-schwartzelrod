$('body').scrollspy({ target: '#main-site-nav' });

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

$('#nav-our-story-link').on('click', function(e){
   if (checkMainPage()) {
       e.preventDefault();
   }
   scrollToAnchor('our-story', 'slow');
});

$('#nav-wedding-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('wedding-info', 'slow');
});

$('#nav-lodging-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('lodging-info', 'slow');
});

$('#nav-vt-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('vt-info', 'slow');
});
$('#nav-rsvp-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('rsvp', 'slow');
});
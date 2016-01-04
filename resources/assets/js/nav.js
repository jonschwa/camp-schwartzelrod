$('body').scrollspy({ target: '#main-site-nav' });

function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
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
   scrollToAnchor('our-story');
});

$('#nav-wedding-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('wedding-info');
});

$('#nav-lodging-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('lodging-info');
});

$('#nav-vt-info-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('vt-info');
});
$('#nav-rsvp-link').on('click', function(e){
    if (checkMainPage()) {
        e.preventDefault();
    }
    scrollToAnchor('rsvp');
});

$('body').scrollspy({ target: '#main-site-nav' });

function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$('#nav-our-story-link').on('click', function(e){
    //e.preventDefault();
   scrollToAnchor('our-story');
});

$('#nav-wedding-info-link').on('click', function(e){
    //e.preventDefault();
    scrollToAnchor('wedding-info');
});

$('#nav-lodging-info-link').on('click', function(e){
    //e.preventDefault();
    scrollToAnchor('lodging-info');
});
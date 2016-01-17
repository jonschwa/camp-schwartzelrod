$( document ).ready(function() {
    var mainSplashArea = $('#main-page-splash');

    //get the page height
    var windowHeight = $(window).height();

    //adjust for page height
    if(windowHeight > mainSplashArea.height()) {
        mainSplashArea.css('height', windowHeight);
    }

    //add some padding on the image
    var imgHeight = $('#main-page-campsign').height();
    var imgMargin = (windowHeight - imgHeight)/4;

    $('#main-page-campsign').css('margin-top', imgMargin);

});
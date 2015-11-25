function showErrorMessage(message) {
    $('#error-flash-message').html(message);
    $('#error-flash-container').fadeIn();
    return false;
}

function toggleInterestColor(active, element) {
    if(active === true) {
        element.style.color = '#1D6107';
    //    element.attr('active', true);
    }
    else {
        element.style.color = '#acadad';
       // element.attr('active', false);
    }
}
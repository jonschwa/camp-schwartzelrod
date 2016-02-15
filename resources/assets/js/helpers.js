function showErrorMessage(message) {
    $('#error-flash-message').html(message);
    $('#error-flash-container').fadeIn();
    return false;
}

function toggleInterestColor(active, element) {
    if(active === true) {
        element.style.color = '#138f22';
    }
    else {
        element.style.color = '#acadad';
    }
}
function showErrorMessage(message) {
    $('#error-flash-message').html(message);
    $('#error-flash-container').fadeIn();
    return false;
}

function showFormErrors(errors, form) {
    console.log(errors);
    $.each(errors, function(key, val) {
       console.log(key);
        var formFieldParent = form.find("input[name='"+key+"']").closest('.form-group');
        if (formFieldParent.length == 0) { //look for a select
            formFieldParent = form.find("select[name='"+key+"']").closest('.form-group');
        }
        console.log(formFieldParent);
        formFieldParent.addClass('has-error');
        formFieldParent.find('.error-label').html(val).show();
    });
}

function showInvitationCodeError() {
    var codeForm = $('#form-enter-code').find('.form-group');
    codeForm.addClass('has-error');
    codeForm.find('.error-label').html('Please double check your code').show();
}

function toggleInterestColor(active, element) {
    if(active === true) {
        element.style.color = '#138f22';
    }
    else {
        element.style.color = '#acadad';
    }
}
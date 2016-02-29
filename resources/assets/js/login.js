$('#form-login').submit(function(event) {
    //@todo show loading gif

    event.preventDefault();
    //@todo some FE validation?

    $.ajax({
        url: "/api/users/login",
        method: "POST",
        data: {
            "email" : $('#form-login-email').val(),
            "password" : $('#form-login-password').val(),
        }
    }).success(function(json) {
        console.log(json);
        //@todo store local user object?
        //@todo redirect to logged in homepage w/ guests
        window.location.href = "/status";
    }).error(function(json) {
        showErrorMessage(json.responseJSON.message);
        //@todo highlight validation errs and show messages
        $('#error-flash-container').fadeIn();
        showFormErrors(json.responseJSON.errors, $('#form-login'));
    });
});

$('#form-nav-login').submit(function(event) {
    hideNavErrors();
    //@todo show loading gif
    event.preventDefault();
    //@todo some FE validation?

    $.ajax({
        url: "/api/users/login",
        method: "POST",
        data: {
            "email" : $('#form-nav-login-email').val(),
            "password" : $('#form-nav-login-password').val()
        }
    }).success(function(json) {
        window.location.href = "/status";
    }).error(function(json) {
        var messageHTML = "<strong>"+json.responseJSON.message+"</strong>";
        var errors = json.responseJSON.errors;
        messageHTML += "<ul>";

        $.each(errors, function (index, value) {
            messageHTML += "<li>" + value + "</li>"
        });
        messageHTML += "</ul>";
        $('#nav-error-body').html(messageHTML);
        $('#nav-error-container').fadeIn();
        scrollToAnchor('page-top', 'fast');
    });
});

$("#btn-nav-error-hide").on("click", function() {
    hideNavErrors();
});

function hideNavErrors()
{
    $('#nav-error-container').fadeOut('fast');
}
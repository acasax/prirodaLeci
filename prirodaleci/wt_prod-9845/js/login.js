$(document).ready(function() {
    $("#login-btn").on('click', function() {
        var username = $("#username").val();
        var password = $("#password").val();
        console.log(password);
    });
});
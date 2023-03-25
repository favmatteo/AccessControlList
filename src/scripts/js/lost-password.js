$(document).ready(function () {
    $("#submit-btn").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "../scripts/php/password-reset.php",
            success: function (res) {
                document.getElementById('reset-password-res').innerHTML = '<div class="alert alert-warning" role="alert">Check your email inbox to reset your password</div>';
            }
        });
    });
});


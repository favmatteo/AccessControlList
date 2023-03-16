$(document).ready(function () {
    $("#submit-btn").click(function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const password = $("#password").val();
        $.ajax({
            url: "../scripts/php/login.php",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (res) {
                if (res.indexOf("success") != -1) {
                    window.location.href = 'dashboard.html';
                } else {
                    document.getElementById('login-res').innerHTML = res;
                }
            }
        });
    });
});
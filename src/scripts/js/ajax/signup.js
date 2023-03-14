$(document).ready(function () {
    $("#submit-btn").click(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        var birthDate = $("#birthDate").val();
        var phoneNumber = $("#phoneNumber").val();
        var password = $("#password").val();
        var repeatedPassword = $("#repeatedPassword").val();


        $.ajax({
            url: "../scripts/php/signup.php",
            type: "POST",
            data: {
                name: name,
                surname: surname,
                email: email,
                birthDate: birthDate,
                phoneNumber: phoneNumber,
                password: password,
                repeatedPassword: repeatedPassword,
            },
            success: function (res) {
                document.getElementById('signup-form').innerHTML = res;
            }
        });
    });
});
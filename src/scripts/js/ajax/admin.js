$(document).ready(() => {
    $(".logout-btn").click((e) => {
        $.ajax({
            url: "../scripts/php/logout.php",
            type: "POST",
            success: function (res) {
                window.location.href = "index.html";
            }
        });
    });
});

function submitForm(formID) {
    console.log(formID)
    console.log(document.getElementById("role" + formID).value);
    console.log(document.getElementById("user" + formID).innerHTML);
    // ajax call
    $.ajax({
        url: "../scripts/php/update-roles.php",
        type: "POST",
        data: {
            newRole: document.getElementById("role" + formID).value,
            userUID: document.getElementById("user" + formID).innerHTML
        },
        success: function (res) {
            window.location.href = "admin.html";
        }
    });
}

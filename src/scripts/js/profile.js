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

function changePhotoButton(userId) {
    const photoLink = document.getElementById("photo-link").value;
    const results = document.getElementById('results');
    $.ajax({
        url: "../scripts/php/update-photo.php",
        type: "POST",
        data: {
            userId: userId,
            photo: photoLink
        },
        success: function (res) {
            console.log(res);
            if (res == "success") {
                results.style.display = "block";
                results.innerHTML = "<div class='alert alert-success' role='alert'>Photo updated successfully! (RELOAD PAGE)</div>";
            } else {
                results.style.display = "block";
                results.innerHTML = "<div class='alert alert-danger' role='alert'>Error updating photo!</div>";
            }
        }
    });
}

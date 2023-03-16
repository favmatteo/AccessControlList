function changeLanguage() {
    const lang = document.getElementById('languageSelector').value;
    $.ajax({
        url: "../scripts/php/save-to-session.php",
        type: "POST",
        data: {
            language: lang,
        },
        success: function (res) {
            location.reload();
        }
    });
}
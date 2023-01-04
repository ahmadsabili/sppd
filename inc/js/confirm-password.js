$(document).ready(function () {
    $("#submit-button-password").click(function () {
        var password = $("#password_baru").val();
        var confirmPassword = $("#konfirmasi_password").val();
        if (password != confirmPassword) {
            alert("Konfirmasi password tidak sesuai");
            return false;
        }
    });
});

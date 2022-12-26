$(document).ready(function () {
    $("#edit-button-instansi").click(function () {
        $("#nama_instansi").removeAttr("readonly");
        $("#keterangan").removeAttr("readonly");
        $("#alamat").removeAttr("readonly");
        $("#kota").removeAttr("readonly");
        $("#kode_pos").removeAttr("readonly");
        $("#no_telp").removeAttr("readonly");
        $("#fax").removeAttr("readonly");
        $("#pimpinan_tertinggi").removeAttr("readonly");
        $("#nama_pimpinan_tertinggi").removeAttr("readonly");
        $("#nip_pimpinan_tertinggi").removeAttr("readonly");
        $("#jabatan_pimpinan_tertinggi").removeAttr("readonly");
        $("#submit-button-instansi").show();
        $("#edit-button-instansi").hide();
        $("#cancel-button-instansi").show();
    });

    $('#cancel-button-instansi').click(function () {
        $("#nama_instansi").attr("readonly", "true");
        $("#keterangan").attr("readonly", "true");
        $("#alamat").attr("readonly", "true");
        $("#kota").attr("readonly", "true");
        $("#kode_pos").attr("readonly", "true");
        $("#no_telp").attr("readonly", "true");
        $("#fax").attr("readonly", "true");
        $("#pimpinan_tertinggi").attr("readonly", "true");
        $("#nama_pimpinan_tertinggi").attr("readonly", "true");
        $("#nip_pimpinan_tertinggi").attr("readonly", "true");
        $("#jabatan_pimpinan_tertinggi").attr("readonly", "true");
        $("#submit-button-instansi").hide();
        $("#edit-button-instansi").show();
        $("#cancel-button-instansi").hide();
    });

    $("#edit-button-ttd").click(function () {
        $("#nama_kabag").removeAttr("readonly");
        $("#nip_kabag").removeAttr("readonly");
        $("#nama_bendahara").removeAttr("readonly");
        $("#nip_bendahara").removeAttr("readonly");
        $("#nama_pptk").removeAttr("readonly");
        $("#nip_pptk").removeAttr("readonly");
        $("#submit-button-ttd").show();
        $("#edit-button-ttd").hide();
        $("#cancel-button-ttd").show();
    });

    $("#cancel-button-ttd").click(function () {
        $("#nama_kabag").attr("readonly", "true");
        $("#nip_kabag").attr("readonly", "true");
        $("#nama_bendahara").attr("readonly", "true");
        $("#nip_bendahara").attr("readonly", "true");
        $("#nama_pptk").attr("readonly", "true");
        $("#nip_pptk").attr("readonly", "true");
        $("#submit-button-ttd").hide();
        $("#edit-button-ttd").show();
        $("#cancel-button-ttd").hide();
    });
});
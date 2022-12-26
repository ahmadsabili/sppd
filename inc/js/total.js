$(document).ready(function () {
    var lumpsum = $('#lumpsum').val();
    var penginapan = $('#penginapan').val();
    var transportasi = $('#transportasi').val();
    var lamaPerjalanan = $('#lama_perjalanan').val();

    var totalLumpsum = parseInt(lumpsum) * parseInt(lamaPerjalanan);
    var totalPenginapan = parseInt(penginapan) * parseInt(lamaPerjalanan);

    $('#total_lumpsum').val(totalLumpsum);
    $('#total_penginapan').val(totalPenginapan);
});
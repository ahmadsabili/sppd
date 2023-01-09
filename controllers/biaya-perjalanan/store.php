<?php
include '../../config/koneksi.php';

$kota_id = $_POST['kota_id'];
$golongan_id = $_POST['golongan_id'];
$lumpsum = $_POST['lumpsum'];
$penginapan = $_POST['penginapan'];
$transportasi = $_POST['transportasi'];

$cek = mysqli_query($koneksi, "SELECT * FROM biaya_perjalanan WHERE kota_id = '$kota_id' AND golongan_id = '$golongan_id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Data sudah ada!');window.location='../../index.php?page=biaya-perjalanan';</script>";
    exit;
} else {
    $sql = "INSERT INTO biaya_perjalanan (kota_id, golongan_id, lumpsum, penginapan, transportasi) VALUES ('$kota_id', '$golongan_id', '$lumpsum', '$penginapan', '$transportasi')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=biaya-perjalanan';</script>";
    } else {
        echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=biaya-perjalanan';</script>";
    }
}
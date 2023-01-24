<?php
include '../../config/koneksi.php';

$kota_id = $_POST['kota_id'];
$tujuan_perjalanan = $_POST['tujuan_perjalanan'];
$kendaraan_id = $_POST['kendaraan_id'];
$tanggal_pergi = $_POST['tanggal_pergi'];
$tanggal_pulang = $_POST['tanggal_pulang'];
$lama_perjalanan = $_POST['lama_perjalanan'];

$pegawai_id = $_POST['pegawai_id'];

$sql = "INSERT INTO nppd (kota_id, tujuan_perjalanan, kendaraan_id, tanggal_pergi, tanggal_pulang, lama_perjalanan, pegawai_id) VALUES ('$kota_id', '$tujuan_perjalanan', '$kendaraan_id', '$tanggal_pergi', '$tanggal_pulang', '$lama_perjalanan', '$pegawai_id')";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    $id_nppd = mysqli_insert_id($koneksi);
    mysqli_query($koneksi, "INSERT INTO spt (nppd_id) VALUES ('$id_nppd')");
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=nppd';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=nppd';</script>";
}
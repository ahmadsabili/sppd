<?php
include '../../config/koneksi.php';

$id_nppd = $_POST['id_nppd'];
$kota_id = $_POST['kota_id'];
$tujuan_perjalanan = $_POST['tujuan_perjalanan'];
$kendaraan_id = $_POST['kendaraan_id'];
$tanggal_pergi = $_POST['tanggal_pergi'];
$tanggal_pulang = $_POST['tanggal_pulang'];
$lama_perjalanan = $_POST['lama_perjalanan'];

$pegawai_id = $_POST['pegawai_id'];
$pegawai_string = implode(",", $pegawai_id);

$sql = "UPDATE nppd SET kota_id='$kota_id', tujuan_perjalanan='$tujuan_perjalanan', kendaraan_id='$kendaraan_id', tanggal_pergi='$tanggal_pergi', tanggal_pulang='$tanggal_pulang', lama_perjalanan='$lama_perjalanan', pegawai_id='$pegawai_string' WHERE id_nppd='$id_nppd'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=nppd';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=nppd';</script>";
}
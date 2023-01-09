<?php
include '../../config/koneksi.php';

$id_biaya_perjalanan = $_POST['id_biaya_perjalanan'];

$kota_id = $_POST['kota_id'];
$golongan_id = $_POST['golongan_id'];
$lumpsum = $_POST['lumpsum'];
$penginapan = $_POST['penginapan'];
$transportasi = $_POST['transportasi'];

$sql = "UPDATE biaya_perjalanan SET kota_id = '$kota_id', golongan_id = '$golongan_id', lumpsum = '$lumpsum', penginapan = '$penginapan', transportasi = '$transportasi' WHERE id_biaya_perjalanan = '$id_biaya_perjalanan'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=biaya-perjalanan';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=biaya-perjalanan';</script>";
}
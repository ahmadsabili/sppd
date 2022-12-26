<?php
include '../../config/koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$nama_kendaraan = $_POST['nama_kendaraan'];

$query = mysqli_query($koneksi, "UPDATE kendaraan SET nama_kendaraan='$nama_kendaraan' WHERE id_kendaraan='$id_kendaraan'");

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=kendaraan';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=kendaraan';</script>";
}
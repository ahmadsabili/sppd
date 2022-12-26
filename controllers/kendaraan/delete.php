<?php 
include '../../config/koneksi.php';

$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($koneksi, "DELETE FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=kendaraan';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=kendaraan';</script>";
}
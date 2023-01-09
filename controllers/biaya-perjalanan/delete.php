<?php 
include '../../config/koneksi.php';

$id_biaya_perjalanan = $_GET['id_biaya_perjalanan'];

$query = mysqli_query($koneksi, "DELETE FROM biaya_perjalanan WHERE id_biaya_perjalanan='$id_biaya_perjalanan'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=biaya-perjalanan';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=biaya-perjalanan';</script>";
}
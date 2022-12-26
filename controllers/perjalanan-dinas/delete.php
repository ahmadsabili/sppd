<?php 
include '../../config/koneksi.php';

$id_perjalanan_dinas = $_GET['id_perjalanan_dinas'];

$query = mysqli_query($koneksi, "DELETE FROM perjalanan_dinas WHERE id_perjalanan_dinas='$id_perjalanan_dinas'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=perjalanan-dinas';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=perjalanan-dinas';</script>";
}
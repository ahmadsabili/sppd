<?php 
include '../../config/koneksi.php';

$id_kota = $_GET['id_kota'];

$query = mysqli_query($koneksi, "DELETE FROM kota WHERE id_kota='$id_kota'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=kota';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=kota';</script>";
}
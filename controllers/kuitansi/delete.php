<?php 
include '../../config/koneksi.php';

$id_kuitansi = $_GET['id_kuitansi'];

$query = mysqli_query($koneksi, "DELETE FROM kuitansi WHERE id_kuitansi='$id_kuitansi'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=kuitansi';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=kuitansi';</script>";
}
<?php 
include '../../config/koneksi.php';

$id_nppd = $_GET['id_nppd'];

$query = mysqli_query($koneksi, "DELETE FROM nppd WHERE id_nppd='$id_nppd'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=nppd';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=nppd';</script>";
}
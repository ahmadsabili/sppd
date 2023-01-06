<?php 
include '../../config/koneksi.php';

$id_sppd = $_GET['id_sppd'];

$query = mysqli_query($koneksi, "DELETE FROM sppd WHERE id_sppd='$id_sppd'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=sppd';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=sppd';</script>";
}
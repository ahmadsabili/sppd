<?php 
include '../../config/koneksi.php';

$id_spt = $_GET['id_spt'];

$query = mysqli_query($koneksi, "DELETE FROM spt WHERE id_spt='$id_spt'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=spt';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=spt';</script>";
}
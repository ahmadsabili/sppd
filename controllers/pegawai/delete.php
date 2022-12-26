<?php 
include '../../config/koneksi.php';

$id_pegawai = $_GET['id_pegawai'];

$query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=pegawai';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=pegawai';</script>";
}
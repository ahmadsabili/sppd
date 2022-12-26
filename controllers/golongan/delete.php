<?php 
include '../../config/koneksi.php';

$id_golongan = $_GET['id_golongan'];

$query = mysqli_query($koneksi, "DELETE FROM golongan WHERE id_golongan='$id_golongan'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!');window.location='../../index.php?page=golongan';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='../../index.php?page=golongan';</script>";
}
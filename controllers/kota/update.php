<?php
include '../../config/koneksi.php';

$id_kota = $_POST['id_kota'];
$nama_kota = $_POST['nama_kota'];

$sql = "UPDATE kota SET nama_kota = '$nama_kota' WHERE id_kota = '$id_kota'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=kota';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=kota';</script>";
}
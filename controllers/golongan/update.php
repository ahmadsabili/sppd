<?php
include '../../config/koneksi.php';

$id_golongan = $_POST['id_golongan'];
$nama_golongan = $_POST['nama_golongan'];

$sql = "UPDATE golongan SET nama_golongan = '$nama_golongan' WHERE id_golongan = '$id_golongan'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=golongan';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=golongan';</script>";
}
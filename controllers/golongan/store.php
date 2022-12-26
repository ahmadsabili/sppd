<?php
include '../../config/koneksi.php';

$nama_golongan = $_POST['nama_golongan'];

$query = mysqli_query($koneksi, "INSERT INTO golongan (nama_golongan) VALUES ('$nama_golongan')");

if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=golongan';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=golongan';</script>";
}
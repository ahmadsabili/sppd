<?php
include '../../config/koneksi.php';

$nama_kendaraan = $_POST['nama_kendaraan'];

$query = mysqli_query($koneksi, "INSERT INTO kendaraan (nama_kendaraan) VALUES ('$nama_kendaraan')");

if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=kendaraan';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=kendaraan';</script>";
}
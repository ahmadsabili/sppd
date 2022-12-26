<?php
include '../../config/koneksi.php';

$nama_kota = $_POST['nama_kota'];

$query = mysqli_query($koneksi, "INSERT INTO kota (nama_kota) VALUES ('$nama_kota')");

if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=kota';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=kota';</script>";
}
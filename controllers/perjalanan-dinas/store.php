<?php
include '../../config/koneksi.php';

$spt_id = $_POST['spt_id'];
$pegawai_id = $_POST['pegawai_id'];
$keterangan = $_POST['keterangan'];
$hasil = $_POST['hasil'];
$tanggal = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO perjalanan_dinas (spt_id, pegawai_id, keterangan, hasil, tanggal) VALUES ('$spt_id', '$pegawai_id', '$keterangan', '$hasil', '$tanggal')");


if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=perjalanan-dinas';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=spt';</script>";
}
<?php
include '../../config/koneksi.php';

$sppd_id = $_POST['sppd_id'];
$diterima_dari = $_POST['diterima_dari'];
$untuk_pembayaran = $_POST['untuk_pembayaran'];
$total_lumpsum = $_POST['total_lumpsum'];
$total_penginapan = $_POST['total_penginapan'];
$total_transportasi = $_POST['total_transportasi'];

$query = mysqli_query($koneksi, "INSERT INTO kuitansi (sppd_id, diterima_dari, untuk_pembayaran, total_lumpsum, total_penginapan, total_transportasi) VALUES ('$sppd_id', '$diterima_dari', '$untuk_pembayaran', '$total_lumpsum', '$total_penginapan', '$total_transportasi')");

if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=kuitansi';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=kuitansi';</script>";
}
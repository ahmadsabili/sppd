<?php
include '../../config/koneksi.php';

$id_kuitansi = $_POST['id_kuitansi'];
$diterima_dari = $_POST['diterima_dari'];
$untuk_pembayaran = $_POST['untuk_pembayaran'];
$total_lumpsum = $_POST['total_lumpsum'];
$total_penginapan = $_POST['total_penginapan'];
$total_transportasi = $_POST['total_transportasi'];

$query = mysqli_query($koneksi, "UPDATE kuitansi SET diterima_dari='$diterima_dari', untuk_pembayaran='$untuk_pembayaran', total_lumpsum='$total_lumpsum', total_penginapan='$total_penginapan', total_transportasi='$total_transportasi' WHERE id_kuitansi='$id_kuitansi'");

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=kuitansi';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=kuitansi';</script>";
}
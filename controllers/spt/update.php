<?php
include '../../config/koneksi.php';

$id_spt = $_POST['id_spt'];
$no_spt = $_POST['no_spt'];
$dasar_hukum = $_POST['dasar_hukum'];

$sql = "UPDATE spt SET no_spt='$no_spt', dasar_hukum='$dasar_hukum' WHERE id_spt='$id_spt'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=spt';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=spt';</script>";
}
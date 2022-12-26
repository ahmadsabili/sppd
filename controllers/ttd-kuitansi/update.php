<?php
include '../../config/koneksi.php';

$nama_kabag = $_POST['nama_kabag'];
$nip_kabag = $_POST['nip_kabag'];
$nama_bendahara = $_POST['nama_bendahara'];
$nip_bendahara = $_POST['nip_bendahara'];
$nama_pptk = $_POST['nama_pptk'];
$nip_pptk = $_POST['nip_pptk'];

$sql = "UPDATE ttd_kuitansi SET nama_kabag = '$nama_kabag', nip_kabag = '$nip_kabag', nama_bendahara = '$nama_bendahara', nip_bendahara = '$nip_bendahara', nama_pptk = '$nama_pptk', nip_pptk = '$nip_pptk' WHERE id_ttd_kuitansi = 1";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=ttd-kuitansi';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=ttd-kuitansi';</script>";
}
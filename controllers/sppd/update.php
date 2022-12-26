<?php
include '../../config/koneksi.php';

$spt_id = $_POST['spt_id'];
$no_sppd = $_POST['no_sppd'];
$pejabat_pemberi_perintah = $_POST['pejabat_pemberi_perintah'];
$instansi = $_POST['instansi'];
$mata_anggaran = $_POST['mata_anggaran'];
$keterangan = $_POST['keterangan'];

$pegawai_id = $_POST['pegawai_id'];

$query = mysqli_query($koneksi, "UPDATE sppd SET no_sppd='$no_sppd', pejabat_pemberi_perintah='$pejabat_pemberi_perintah', instansi='$instansi', mata_anggaran='$mata_anggaran', keterangan='$keterangan' WHERE spt_id='$spt_id'");

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=sppd';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');";
}
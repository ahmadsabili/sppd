<?php
include '../../config/koneksi.php';

$spt_id = $_POST['spt_id'];
$no_sppd = $_POST['no_sppd'];
$pejabat_pemberi_perintah = $_POST['pejabat_pemberi_perintah'];
$instansi = $_POST['instansi'];
$mata_anggaran = $_POST['mata_anggaran'];
$keterangan = $_POST['keterangan'];

$pegawai_id = $_POST['pegawai_id'];

foreach ($pegawai_id as $key => $value) {
    $sql = "INSERT INTO sppd (spt_id, no_sppd, pejabat_pemberi_perintah, instansi, mata_anggaran, keterangan, pegawai_id) VALUES ('$spt_id', '$no_sppd', '$pejabat_pemberi_perintah', '$instansi', '$mata_anggaran', '$keterangan', '$value')";
    $query = mysqli_query($koneksi, $sql);
}

if ($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=sppd';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');";
}
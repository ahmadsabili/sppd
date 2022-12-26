<?php
include '../../config/koneksi.php';

$id_pegawai = $_POST['id_pegawai'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$pangkat = $_POST['pangkat'];
$golongan_id = $_POST['golongan_id'];
$jabatan = $_POST['jabatan'];
$unit_kerja = $_POST['unit_kerja'];

$sql = "UPDATE pegawai SET nip='$nip', nama='$nama', pangkat='$pangkat', golongan_id='$golongan_id', jabatan='$jabatan', unit_kerja='$unit_kerja' WHERE id_pegawai='$id_pegawai'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=pegawai';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=pegawai';</script>";
}
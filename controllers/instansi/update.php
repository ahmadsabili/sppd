<?php
include '../../config/koneksi.php';

$nama_instansi = $_POST['nama_instansi'];
$keterangan = $_POST['keterangan'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$kode_pos = $_POST['kode_pos'];
$no_telp = $_POST['no_telp'];
$fax = $_POST['fax'];
$pimpinan_tertinggi = $_POST['pimpinan_tertinggi'];
$nama_pimpinan_tertinggi = $_POST['nama_pimpinan_tertinggi'];
$nip_pimpinan_tertinggi = $_POST['nip_pimpinan_tertinggi'];
$jabatan_pimpinan_tertinggi = $_POST['jabatan_pimpinan_tertinggi'];

$sql = "UPDATE profil_instansi SET nama_instansi='$nama_instansi', keterangan='$keterangan', alamat='$alamat', kota='$kota', kode_pos='$kode_pos', no_telp='$no_telp', fax='$fax', pimpinan_tertinggi='$pimpinan_tertinggi', nama_pimpinan_tertinggi='$nama_pimpinan_tertinggi', nip_pimpinan_tertinggi='$nip_pimpinan_tertinggi', jabatan_pimpinan_tertinggi='$jabatan_pimpinan_tertinggi' WHERE id_profil_instansi='1'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diupdate!');window.location='../../index.php?page=profil-instansi';</script>";
} else {
    echo "<script>alert('GAGAL diupdate!');window.location='../../index.php?page=profil-instansi';</script>";
}
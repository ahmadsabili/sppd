<?php
include '../../config/koneksi.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$pangkat = $_POST['pangkat'];
$golongan_id = $_POST['golongan_id'];
$jabatan = $_POST['jabatan'];
$unit_kerja = $_POST['unit_kerja'];

$sql = "INSERT INTO pegawai (nip, nama, pangkat, golongan_id, jabatan, unit_kerja) VALUES ('$nip', '$nama', '$pangkat', '$golongan_id', '$jabatan', '$unit_kerja')";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    $pegawai_id = mysqli_insert_id($koneksi);
    $password = password_hash($nip, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "INSERT INTO users (username, password, role, pegawai_id) VALUES ('$nip', '$password', 'user', '$pegawai_id')");

    echo "<script>alert('Data berhasil ditambahkan!');window.location='../../index.php?page=pegawai';</script>";
} else {
    echo "<script>alert('GAGAL ditambahkan!');window.location='../../index.php?page=pegawai';</script>";
}
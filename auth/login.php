<?php
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $pegawai = mysqli_query($koneksi, "SELECT nama FROM pegawai WHERE id_pegawai = '$row[pegawai_id]'");
        $pegawai = mysqli_fetch_assoc($pegawai);
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['pegawai_id'] = $row['pegawai_id'];
        $_SESSION['nama'] = $pegawai['nama'];
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?pesan=username-password-salah');
    }
} else {
    header('Location: ../login.php?pesan=username-password-salah');
}
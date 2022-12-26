<?php
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['pegawai_id'] = $row['pegawai_id'];
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?pesan=username-password-salah');
    }
} else {
    header('Location: ../login.php?pesan=username-password-salah');
}
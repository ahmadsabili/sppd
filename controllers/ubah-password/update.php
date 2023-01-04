<?php
include '../../config/koneksi.php';

$id_user = $_POST['id'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
echo $id_user;

$user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($user);

if (password_verify($password_lama, $user['password'])) {
    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    $update = mysqli_query($koneksi, "UPDATE users SET password='$password_baru' WHERE id_user='$id_user'");
    if ($update) {
        echo "<script>alert('Password berhasil diubah!');window.location='../../index.php';</script>";
    } else {
        echo "<script>alert('Password gagal diubah!');window.location='../../index.php?page=ubah-password';</script>";
    }
} else {
    echo "<script>alert('Password lama salah!');window.location='../../index.php?page=ubah-password';</script>";
}
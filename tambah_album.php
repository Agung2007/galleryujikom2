<?php
include "koneksi.php";
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['userid'])) {
    die("Anda harus login terlebih dahulu!");
}

// Ambil data dari form
$namaalbum = $_POST['namaalbum'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';
$tanggaldibuat = date("Y-m-d");
$userid = $_SESSION['userid'];

// Validasi input
if (empty($namaalbum) || empty($deskripsi)) {
    die("Nama album dan deskripsi tidak boleh kosong!");
}

// Gunakan prepared statement untuk keamanan
$sql = $conn->prepare("INSERT INTO album (namaalbum, deskripsi, tanggaldibuat, userid) VALUES (?, ?, ?, ?)");
$sql->bind_param("sssi", $namaalbum, $deskripsi, $tanggaldibuat, $userid);

if ($sql->execute()) {
    header("Location: album.php");
    exit();
} else {
    echo "Gagal menambahkan album: " . $sql->error;
}
?>

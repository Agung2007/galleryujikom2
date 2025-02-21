<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['userid'])) {
    // Pengguna harus login dulu
    header("Location: index.php");
    exit();
}

// Pastikan `fotoid` ada dan merupakan angka
if (!isset($_GET['fotoid']) || !is_numeric($_GET['fotoid'])) {
    die("Foto ID tidak valid!");
}

$fotoid = intval($_GET['fotoid']);
$userid = $_SESSION['userid'];

// Cek apakah user sudah pernah like foto ini
$sql = $conn->prepare("SELECT * FROM likefoto WHERE fotoid = ? AND userid = ?");
$sql->bind_param("ii", $fotoid, $userid);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // User sudah pernah like, langsung redirect
    header("Location: index.php");
    exit();
} else {
    // Insert like baru
    $tanggallike = date("Y-m-d");
    $insert = $conn->prepare("INSERT INTO likefoto (fotoid, userid, tanggallike) VALUES (?, ?, ?)");
    $insert->bind_param("iis", $fotoid, $userid, $tanggallike);
    
    if ($insert->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal memberikan like: " . $insert->error;
    }
}
?>

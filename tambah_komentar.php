<?php
include "koneksi.php";
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['userid'])) {
    die("Anda harus login terlebih dahulu!");
}

$fotoid = $_POST['fotoid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date("Y-m-d");
$userid = $_SESSION['userid'];

// Gunakan Prepared Statement
$sql = $conn->prepare("INSERT INTO komentarfoto (fotoid, userid, isikomentar, tanggalkomentar) VALUES (?, ?, ?, ?)");
$sql->bind_param("iiss", $fotoid, $userid, $isikomentar, $tanggalkomentar);

if ($sql->execute()) {
    header("Location: komentar.php?fotoid=" . $fotoid);
    exit();
} else {
    echo "Gagal menambahkan komentar: " . $sql->error;
}
?>

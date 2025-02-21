<?php
include "koneksi.php";
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['userid'])) {
    die("Anda harus login terlebih dahulu!");
}

// Ambil data dari form
$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];
$tanggalunggah = date("Y-m-d");
$userid = $_SESSION['userid'];

// Validasi apakah file telah diunggah
if (!isset($_FILES['lokasifile']) || $_FILES['lokasifile']['error'] != 0) {
    die("Terjadi kesalahan saat mengunggah file!");
}

$rand = rand();
$ekstensiValid = ['png', 'jpg', 'jpeg', 'gif'];
$filename = $_FILES['lokasifile']['name'];
$ukuran = $_FILES['lokasifile']['size'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

// Validasi ekstensi file
if (!in_array($ext, $ekstensiValid)) {
    die("Format file tidak didukung! Hanya PNG, JPG, JPEG, dan GIF yang diperbolehkan.");
}

// Validasi ukuran file (maks 5MB)
$maxSize = 5 * 1024 * 1024; // 5MB
if ($ukuran > $maxSize) {
    die("Ukuran file terlalu besar! Maksimal 5MB.");
}

// Pastikan folder "gambar/" ada, jika tidak buat baru
$folder = "gambar/";
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Simpan file dengan nama 
$namaFileBaru = $rand . "_" . basename($filename);
$lokasiSimpan = $folder . $namaFileBaru;

if (move_uploaded_file($_FILES['lokasifile']['tmp_name'], $lokasiSimpan)) {
    // Gunakan Prepared Statement untuk keamanan dan adalah yang 
    $sql = $conn->prepare("INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, albumid, userid) VALUES (?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssii", $judulfoto, $deskripsifoto, $tanggalunggah, $lokasiSimpan, $albumid, $userid);
    
    if ($sql->execute()) {
        header("Location: foto.php");
        exit();
    } else {
        echo "Gagal menyimpan ke database: " . $sql->error;
    }
} else {
    die("Gagal mengunggah foto!");
}
?>

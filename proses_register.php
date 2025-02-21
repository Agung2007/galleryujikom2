<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

// Gunakan prepared statement untuk mencegah SQL Injection
$sql = $conn->prepare("INSERT INTO user (username, password, email, namalengkap, alamat) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $username, $password, $email, $namalengkap, $alamat);

if ($sql->execute()) {
    header("Location: login.php");
    exit();
} else {
    echo "Pendaftaran gagal: " . $sql->error;
}
?>

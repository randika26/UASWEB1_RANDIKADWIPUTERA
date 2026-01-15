<?php
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "db_penjualan2";

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// // echo "Koneksi berhasil"; // Baris ini dimatikan agar tidak muncul di halaman utama
?>
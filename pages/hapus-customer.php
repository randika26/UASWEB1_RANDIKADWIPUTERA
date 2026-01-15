<?php
include 'koneksi.php';

// Mengambil ID dari parameter URL
// Pastikan nama variabel di URL sesuai (misal: ?id=...)
$id = $_GET['id'];

// Menjalankan query hapus pada tabel pelanggan
// Pastikan primary key di tabel kamu adalah id_pelanggan
$delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = '$id'");

if ($delete) {
    // Jika berhasil, alihkan kembali ke list customer
    header("Location: dashboard.php?page=listcustomer");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
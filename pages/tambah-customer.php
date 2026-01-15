<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    // Mengambil data dari form sesuai field pelanggan
    $kode   = $_POST['kode_pelanggan'];
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    // Query INSERT ke tabel pelanggan
    $query = mysqli_query($conn, "
        INSERT INTO pelanggan 
        (kode_pelanggan, nama_pelanggan, alamat, no_hp, email) 
        VALUES 
        ('$kode', '$nama', '$alamat', '$no_hp', '$email')
    ");

    if ($query) {
        // Redirect ke list customer jika berhasil
        echo "<script>alert('Data berhasil disimpan!'); window.location='dashboard.php?page=listcustomer';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<style>
    /* Card */
    .card {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        margin-right: auto;
        margin-left: 0;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        font-family: sans-serif;
    }

    /* Judul */
    .card h3 {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    /* Form */
    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }

    input, textarea {
        width: 100%;
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box; /* Agar padding tidak merusak lebar */
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #3498db;
    }

    /* Tombol */
    .btn {
        padding: 10px 16px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 14px;
        display: inline-block;
    }

    .btn-tambah {
        background: #27ae60;
    }

    .btn-tambah:hover {
        background: #219150;
    }

    .btn-batal {
        background: #c0392b;
    }

    .btn-batal:hover {
        background: #a93226;
    }
</style>

<div class="card">
    <h3>Tambah Pelanggan</h3>
    <form method="post">
        <div class="form-group">
            <label>Kode Pelanggan</label>
            <input type="text" name="kode_pelanggan" placeholder="Contoh: CUST001" required>
        </div>
        
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" placeholder="Alamat Lengkap" required></textarea>
        </div>

        <div class="form-group">
            <label>No. HP</label>
            <input type="text" name="no_hp" placeholder="08xxxxxxxxxx" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="email@contoh.com" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-tambah">Simpan Data</button>
        <a href="dashboard.php?page=listcustomer" class="btn btn-batal">Batal</a>
    </form>
</div>
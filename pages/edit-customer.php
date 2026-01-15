<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

/* PROSES UPDATE */
if (isset($_POST['update'])) {
    $kode   = $_POST['kode_pelanggan'];
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $update = mysqli_query($conn, "
        UPDATE pelanggan SET
            kode_pelanggan = '$kode',
            nama_pelanggan = '$nama',
            alamat         = '$alamat',
            no_hp          = '$no_hp',
            email          = '$email'
        WHERE id_pelanggan = '$id'
    ");

    if ($update) {
        echo "<script>alert('Data pelanggan berhasil diupdate!'); window.location='dashboard.php?page=listcustomer';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}

/* AMBIL DATA LAMA */
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "Data pelanggan tidak ditemukan!";
    exit;
}
?>

<style>
    .card {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        font-family: sans-serif;
    }
    .form-group {
        margin-bottom: 16px;
    }
    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }
    input, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
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
    .btn-edit {
        background: #2980b9;
    }
    .btn-batal {
        background: #c0392b;
    }
</style>

<div class="card">
    <h3>Edit Data Pelanggan</h3>
    <form method="post">
        <div class="form-group">
            <label>Kode Pelanggan</label>
            <input type="text" name="kode_pelanggan" value="<?= $data['kode_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" required><?= $data['alamat']; ?></textarea>
        </div>

        <div class="form-group">
            <label>No. HP</label>
            <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $data['email']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-edit">Update Data</button>
        <a href="dashboard.php?page=listcustomer" class="btn btn-batal">Batal</a>
    </form>
</div>
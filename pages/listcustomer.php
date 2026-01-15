<?php
include 'koneksi.php';

// Nama tabel diubah menjadi 'pelanggan'
$data = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");

// Cek jika query gagal untuk menghindari error fatal lagi
if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<style>
    .card {
        background: white;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        font-family: sans-serif;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .btn {
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        color: white;
        font-size: 14px;
        display: inline-block;
    }

    .btn-tambah { background: #27ae60; }
    .btn-edit { background: #2980b9; }
    .btn-hapus { background: #c0392b; }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th { background: #f8f8f8; }
</style>

<div class="card">
    <div class="card-header">
        <h3>List Pelanggan</h3>
        <a href="dashboard.php?page=tambah-customer" class="btn btn-tambah">+ Tambah Pelanggan</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Email</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= $row['kode_pelanggan']; ?></strong></td>
                    <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td style="text-align: center;">
                        <a href="dashboard.php?page=edit-customer&id=<?= $row['id_pelanggan']; ?>" class="btn btn-edit">Edit</a>
                        
                        <a href="dashboard.php?page=hapus-customer&id=<?= $row['id_pelanggan']; ?>"
                           class="btn btn-hapus"
                           onclick="return confirm('Yakin ingin menghapus data pelanggan ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>
            
            <?php if (mysqli_num_rows($data) == 0) : ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data pelanggan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
session_start();
include "koneksi.php";

// Proteksi Halaman: Jika sudah login, langsung ke dashboard
if (isset($_SESSION['email'])) { 
    header("Location: dashboard.php");
    exit;
}

// Proses Login saat tombol submit ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mencari user berdasarkan email
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if ($row = mysqli_fetch_assoc($result)) {
        // Validasi password
        if ($password == $row['password']) {
            // Menyimpan data ke session
            $_SESSION['email'] = $row['email'];
            $_SESSION['name']  = $row['name'];
            $_SESSION['role']  = $row['role'];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - POLGAN MART</title>
</head>
<body>
    <div class="login-card">
        <h2>POLGAN MART</h2>

        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn">Login</button>
            <button type="reset" class="btn-reset">Batal</button>
        </form>

        <div class="footer">
            <p>&copy; 2026 POLGAN MART</p>
        </div>
    </div>
</body>
</html>
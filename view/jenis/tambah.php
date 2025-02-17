<?php
include '../../config/koneksi.php';

if ($_POST) {
    $nama_jenis = mysqli_real_escape_string($conn, $_POST['nama_jenis']); // Validasi input

    // iniquery untuk tambah jenis
    $query = mysqli_query($conn, "INSERT INTO jenis (nama_jenis) VALUES ('$nama_jenis')");

    if ($query) {
        // Redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?status=sukses");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jenis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Tambah Jenis</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_jenis" class="form-label">Nama Jenis</label>
                <input type="text" name="nama_jenis" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
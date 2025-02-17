<?php
include '../../config/koneksi.php';

if ($_POST) {
    $nama_barang = $_POST['nama_barang'];
    $id_jenis = $_POST['id_jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // query nambah barang 
    $query = mysqli_query($conn, "INSERT INTO barang (nama_barang, id_jenis, harga, stok) VALUES ('$nama_barang', '$id_jenis', '$harga', '$stok')");

    if ($query) {
        header("Location: index.php"); // Redirect ke halaman
    } else {
        echo "Gagal menambah data!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Tambah Barang</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="id_jenis" class="form-label">Jenis Barang</label>
                <select name="id_jenis" class="form-control" required>
                    <?php
                    //nqmpilan data jenis
                    $jenis_query = mysqli_query($conn, "SELECT * FROM jenis");
                    while ($jenis = mysqli_fetch_assoc($jenis_query)) {
                        echo "<option value='{$jenis['id_jenis']}'>{$jenis['nama_jenis']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

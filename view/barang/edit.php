<?php
include '../../config/koneksi.php';

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];
    
    // Ambil data barang berdasarkan id_barang
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
    $data = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 0) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID Barang tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $id_jenis = $_POST['id_jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Query untuk update data barang
    $update_query = mysqli_query($conn, "UPDATE barang SET 
        nama_barang = '$nama_barang', 
        id_jenis = '$id_jenis', 
        harga = '$harga', 
        stok = '$stok' 
        WHERE id_barang = '$id_barang'");

    if ($update_query) {
        header("Location: index.php");
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Edit Barang</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_jenis" class="form-label">ID Jenis</label>
                <input type="number" class="form-control" id="id_jenis" name="id_jenis" value="<?php echo $data['id_jenis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $data['stok']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

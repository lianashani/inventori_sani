<?php
include '../../config/koneksi.php';
if ($_GET) {
    $id_jenis = $_GET['id_jenis'];
    $query = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = '$id_jenis'");
    $data = mysqli_fetch_assoc($query);
    if ($_POST) {
        $nama_jenis = $_POST['nama_jenis'];
        mysqli_query($conn, "UPDATE jenis SET nama_jenis = '$nama_jenis' WHERE id_jenis = '$id_jenis'");
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jenis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Edit Jenis</h3>
        <form method="POST">
            <input type="text" name="nama_jenis" class="form-control mb-3" value="<?php echo $data['nama_jenis']; ?>" required>
            <button class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

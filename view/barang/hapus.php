<?php
include '../../config/koneksi.php';

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Hapus data barang
    $delete_query = mysqli_query($conn, "DELETE FROM barang WHERE id_barang = '$id_barang'");

    if ($delete_query) {
        header("Location: index.php"); // Redirect ke halaman utama setelah menghapus
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID Barang tidak ditemukan!";
}
?>

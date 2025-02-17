<?php
include '../../config/koneksi.php';
if ($_GET) {
    $id_jenis = $_GET['id_jenis'];
    mysqli_query($conn, "DELETE FROM jenis WHERE id_jenis = '$id_jenis'");
    header("Location: index.php");
}
?>

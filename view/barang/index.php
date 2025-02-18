<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
body {
  background-image: url('https://media.istockphoto.com/id/2165328281/id/foto/bintik-bintik-berkilau-emas-di-perbatasan-latar-belakang-putih.jpg?s=1024x1024&w=is&k=20&c=2gV9RPBeOhBGAkD8AAJk3qIgAtnYt3cATASgMx0JSv8=');
}
</style>
<body>
<!-- nav -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar" style="background-color: #BBA53D;">
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyInvent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../barang/index.php">barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../jenis/index.php">jenis</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../toko/index.html">Myshop</a>
      </ul>
      <form class="d-flex" role="search" method="GET" action="index.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</nav>
<!-- nav -->

 <!-- database -->
 <div class="container">
  <h3> Data Barang Toko Shani </h3>
  <a href="tambah.php" class="btn btn-dark mb-3">Tambah Barang</a>
  <table class="table table-bordered border-dark">
    <thead>
        <th>id barang</th>
        <th>nama barang</th>
        <th>id jenis</th>
        <th>harga</th>
        <th>stok</th>
        <th>aksi</th>
    </thead>
    <tbody>
        <?php 
        include '../../config/koneksi.php';

        // Ambil parameter pencarian
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Menambahkan LIKE pada query untuk pencarian
        $query = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['id_jenis']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td>
                        <a href="edit.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-info">Edit</a>
                        <a href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6'>Data kosong</td></tr>";
        }
        ?>
    </tbody>
  </table>
</div>
<!-- database -->
</body>
</html>

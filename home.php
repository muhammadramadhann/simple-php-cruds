<?php

session_start();

require_once "./controller.php";

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$query = "SELECT * FROM tb_penumpang";

$passengers = query("SELECT * FROM tb_penumpang");

// search
if (isset($_POST["search"])) {
  $passengers = search($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- style -->
    <style>
      .container .d-flex {
        align-items: center;
      }

      @media screen and (max-width: 1200px) {
        .update, .delete {
          width: 100%;
        }
        .update {
          margin-bottom: 4px;
        }
      }

      @media screen and (max-width: 576px) {
        .container .d-flex {
          flex-direction: column;
          align-items: flex-start;
        }
      }
    </style>

    <title>Beranda</title>
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="container py-3 mx-auto">
      <div class="my-3 d-flex justify-content-between mb-4">
        <h3 class="fw-bold">Data Penumpang</h3>
        <a class="btn btn-primary" href="create.php">+ Tambah Data</a>
      </div>
      
      <div class="border rounded p-4 table-responsive-xl">
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Kota Asal</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Maskapai</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $number = 1; ?>
            <?php foreach($passengers as $passenger): ?>
            <tr>
              <td><?= $number++ ?></td>
              <td><?= $passenger["nama"]; ?></td>
              <td><?= $passenger["tanggal_lahir"]; ?></td>
              <td><?= $passenger["jenis_kelamin"]; ?></td>
              <td><?= $passenger["asal"]; ?></td>
              <td><?= $passenger["tujuan"]; ?></td>
              <td><?= $passenger["maskapai"]; ?></td>
              <td>
                <a href="update.php?id=<?= $passenger["id"]; ?>" class="btn btn-warning update">Edit</a>
                <a href="delete.php?id=<?= $passenger["id"]; ?>" class="btn btn-danger delete" onclick="return confirm('PERHATIAN!\nData akan terhapus permanen');">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
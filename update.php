<?php

session_start();

require_once "./controller.php";

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$id = $_GET["id"];

$passengers = query("SELECT * FROM tb_penumpang WHERE id = '$id'");

// mengecek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  
  // cek apakah data berhasil diubah atau tidak
  if (update($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil diperbarui!')
      document.location.href = 'home.php'
    </script>";
  } else {
    echo "
    <div class='container mt-2'>
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        gagal memperbarui data!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
    </div>";
  }
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
      .addform {
        max-width: 550px;
      }

      @media screen and (max-width: 576px) {
        .addform {
          width: 100%;
        }
      }
    </style>

    <title>Form Ubah Data</title>
  </head>
  <body>
    <div class="container pt-4 mt-4">
      <a href="home.php" class="btn btn-primary">Batal</a>
    </div>
    <div class="container py-4 px-5 mx-auto addform border rounded">
      <h2 class="pb-4 my-4 text-center">Ubah Data Penumpang</h2>

      <form action="" method="POST">
        <?php foreach($passengers as $passenger): ?>
        <input type="hidden" class="form-control" name="id" required value="<?= $passenger["id"]; ?>">
        <div class="row mb-3">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" required value="<?= $passenger["nama"]; ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" name="tanggal_lahir" required value="<?= $passenger["tanggal_lahir"]; ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="tanggal_lahir" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-9">
            <div class="form-check form-check-inline mt-2">
              <input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria" required <?php if ($passenger['jenis_kelamin'] == 'Pria') {echo "checked";} ?>>
              <label class="form-check-label" for="jk_pria">
                Pria
              </label>
            </div>
            <div class="form-check form-check-inline mt-2">
              <input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita" required <?php if ($passenger['jenis_kelamin'] == 'Wanita') {echo "checked";} ?>>
              <label class="form-check-label" for="jk_wanita">
                Wanita
              </label>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="asal" class="col-sm-3 col-form-label">Kota Asal</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="asal" required value="<?= $passenger["asal"]; ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="tujuan" required value="<?= $passenger["tujuan"]; ?>">
          </div>
        </div>
        <div class="row mb-4">
          <label for="maskapai" class="col-sm-3 col-form-label">Maskapai</label>
          <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example" name="maskapai" required>
              <option disabled selected>--Pilih--</option>
              <option value="Batik Air" <?php if ($passenger['maskapai'] == 'Batik Air') {echo "selected";} ?>>Batik Air</option>
              <option value="Citilink" <?php if ($passenger['maskapai'] == 'Citilink') {echo "selected";} ?>>Citilink</option>
              <option value="Garuda Indonesia" <?php if ($passenger['maskapai'] == 'Garuda Indonesia') {echo "selected";} ?>>Garuda Indonesia</option>
              <option value="Indonesia Air Asia" <?php if ($passenger['maskapai'] == 'Indonesia Air Asia') {echo "selected";} ?>>Indonesia Air Asia</option>
              <option value="Lion Air" <?php if ($passenger['maskapai'] == 'Lion Air') {echo "selected";} ?>>Lion Air</option>
              <option value="NAM Air" <?php if ($passenger['maskapai'] == 'NAM Air') {echo "selected";} ?>>NAM Air</option>
              <option value="Sriwijaya Air" <?php if ($passenger['maskapai'] == 'Sriwijaya Air') {echo "selected";} ?>>Sriwijaya Air</option>
              <option value="Super Air Jet" <?php if ($passenger['maskapai'] == 'Super Air Jet') {echo "selected";} ?>>Super Air Jet</option>
              <option value="Wings Air" <?php if ($passenger['maskapai'] == 'Wings Air') {echo "selected";} ?>>Wings Air</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <button type="reset" class="btn btn-secondary w-100 mb-2">Reset</button>
          </div>
          <div class="col-sm-9">
            <button type="submit" name="submit" class="btn btn-primary w-100" onclick="return confirm('Simpan perubahan?');">Simpan Data</button>
          </div>
        </div>
        <?php endforeach; ?>
      </form>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
<?php

require_once "./controller.php";

$id = $_GET["id"];

if (delete($id) > 0){
  echo "
    <script>
      alert('data berhasil dihapus!')
      document.location.href = 'home.php'
    </script>";
  } else {
    echo "
    <div class='container mt-2'>
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        gagal menghapus data!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
    </div>";
  }

?>
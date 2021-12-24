<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container py-2">
    <a class="btn btn-primary" href="create.php">+ Tambah Data</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <form action="home.php" method="POST" class="d-flex me-2">
            <input type="text" class="form-control me-2" name="keyword" size="25" autocomplete="off" placeholder="Cari data...">
            <button type="submit" name="search" class="btn btn-outline-primary text-white">Cari</button>
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="btn btn-primary dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['username'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Edit Profil</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
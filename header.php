<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PMII Kabupaten Tangerang</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar Start -->
  <div class="container-fluid sticky-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a href="index.html" class="navbar-brand">
          <h1 class="text-white">PMII<span class="text-dark">.</span>KabTang</h1>
        </a>
        <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link active">About</a>
            <a href="#kaderisasi" class="nav-item nav-link">Kaderisasi</a>
            <a href="#shop" class="nav-item nav-link">Shop</a>
            <a href="#team" class="nav-item nav-link">Pengurus</a>
            <?php if (!isset($_SESSION['login_anggota'])) { ?>
              <a href="login.php" class="nav-item nav-link">Login</a>
            <?php } else {
              $sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_anggota]'");
              $user = $sql_user->fetch_assoc();
            ?>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hallo <?= $user['nama_user']; ?></a>
                <div class="dropdown-menu bg-light mt-2">
                  <a href="#" class="dropdown-item">Status : <?= $user['status']; ?></a>
                  <hr>
                  <a href="pesanan.php" class="dropdown-item">Pesanan Anda</a>
                  <a href="ubah_password.php" class="dropdown-item">Ubah Password</a>
                  <a href="ubah_profil.php" class="dropdown-item">Ubah Profil</a>
                  <a href="logout.php" class="dropdown-item">Logout</a>
                </div>
              </div>
            <?php } ?>
          </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->
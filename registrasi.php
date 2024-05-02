<?php
session_start();
require 'config.php';
if (isset($_SESSION['login_anggota'])) {
  header("location:index.php");
}

if (isset($_POST["submit"])) {
  $nik = $_POST["nik"];
  $npm = $_POST["npm"];
  $nama = $_POST["nama_user"];
  $email = $_POST["email"];
  $ttl = $_POST["ttl"];
  $asal_kampus = $_POST["asal_kampus"];
  $nomor_hp = $_POST["nomor_hp"];
  $alamat = $_POST["alamat"] . ' ' . $_POST["kota"] . '-' . $_POST["provinsi"] . ' ' . 'Kode Pos : ' . $_POST["kodepos"];
  $password = md5($_POST["password"]);
  $sql_user = sql("SELECT email FROM user WHERE email='$_POST[email]'");
  $user = $sql_user->fetch_assoc();
  if (!empty($user)) {
    echo "
        <script>
        alert('Email sudah digunakan');
        document.location.href = 'registrasi.php';
        </script>
        ";
  } else {
    // var_dump($nomor_hp);
    $tambah = sql("INSERT INTO user (nik, npm, nama_user, email, `password`, nomor_hp, ttl, asal_kampus, alamat, `status`, `level`) VALUES ('$nik', '$npm', '$nama', '$email','$password','$nomor_hp','$ttl','$asal_kampus','$alamat','Calon Anggota','1')");
    // INI BARU DI UBAH
    echo "
        <script>
        alert('Data berhasil Ditambahkan');
        document.location.href = 'login.php';
        </script>
        ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <title>PMII Kabupaten Tangerang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #eaeaea;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-4">Registrasi </h2>
        <div class="card my-3">
          <form class="card-body cardbody-color p-lg-5" method="post">
            <div class="text-center">
              <img src="img/about-img1.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle mb-3" width="150px" alt="profile" style="margin-top: -30px;">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="nik" aria-describedby="nikHelp" placeholder="Masukan Nomor Induk Kewarganegaraan" name="nik" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="npm" aria-describedby="npmHelp" placeholder="Masukan Nomor Pokok Mahasiswa" name="npm" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="nama" aria-describedby="namaHelp" placeholder="Masukan Nama Lengkap" name="nama_user" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email" name="email" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="ttl" aria-describedby="ttlHelp" placeholder="Tempat Lahir, Tanggal Bulan Tahun Lahir" name="ttl" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="asal_kampus" aria-describedby="asal_kampusHelp" placeholder="Masukan Kampus Anda" name="asal_kampus" required>
            </div>
            <div class="mb-3">
              <input type="tel" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nomor_hp" aria-describedby="nomor_hpHelp" placeholder="Masukan Nomor Handphone" name="nomor_hp" required>
            </div>
            <div class="mb-1">
              <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat">
            </div>
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Kota/Kabupaten" name="kota">
                <input type="text" class="form-control" placeholder="Provinsi" name="provinsi">
                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" placeholder="Kode Pos" name="kodepos">
              </div>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-info px-5 mb-3 w-100" name="submit">Registrasi</button>
            </div>
          </form>
          <p class="text-center" style="margin-top: -50px; margin-bottom: 30px;">Sudah punya akun? <a href="login.php">Login Sekarang</a></p>
        </div>
      </div>
    </div>
  </div>


  <script src="<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
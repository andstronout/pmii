<?php
session_start();
require '../config.php';
if (!isset($_SESSION['login_admin'])) {
  header("location:login.php");
}
$id = $_GET["id"];
$sql = sql("SELECT * FROM user WHERE id_user='$id'");
$query = $sql->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #eaeaea;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-4">Edit Profile</h2>
        <div class="card my-3">
          <form class="card-body cardbody-color p-lg-5" method="post">
            <div class="text-center">
              <img src="../img/about-img1.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle mb-3" width="150px" alt="profile" style="margin-top: -30px;">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="nik" aria-describedby="nikHelp" placeholder="Masukan Nomor Induk Kewarganegaraan" value="<?= $query['nik']; ?>" name="nik" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="npm" aria-describedby="npmHelp" placeholder="Masukan Nomor Pokok Mahasiswa" value="<?= $query['npm']; ?>" name="npm" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="nama" aria-describedby="namaHelp" placeholder="Masukan Nama Lengkap" name="nama_user" value="<?= $query['nama_user']; ?>" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email" value="<?= $query['email']; ?>" name="email" required disabled>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="ttl" aria-describedby="ttlHelp" placeholder="Tempat Lahir, Tanggal Bulan Tahun Lahir" name="ttl" value="<?= $query['ttl']; ?>" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="asal_kampus" aria-describedby="asal_kampusHelp" placeholder="Masukan Kampus Anda" name="asal_kampus" value="<?= $query['asal_kampus']; ?>" required>
            </div>
            <div class="mb-3">
              <input type="tel" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nomor_hp" aria-describedby="nomor_hpHelp" placeholder="Masukan Nomor Handphone" name="nomor_hp" value="<?= $query['nomor_hp']; ?>" required>
            </div>
            <div class="mb-1">
              <input type="text" class="form-control" placeholder="Alamat Lengkap" value="<?= $query['alamat']; ?>" name="alamat">
            </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-info px-5 mb-2 w-100" name="submit">Edit Profil</button>
          <a href="index.php" class="btn btn-outline-secondary px-5 w-100">Halaman Utama</a>
        </div>
        </form>
      </div>

    </div>
  </div>
  </div>

  <?php
  if (isset($_POST['submit'])) {

    $update = ("UPDATE user SET nik = '$_POST[nik]', npm = '$_POST[npm]', nama_user = '$_POST[nama_user]', ttl = '$_POST[ttl]', asal_kampus = '$_POST[asal_kampus]', nomor_hp = '$_POST[nomor_hp]', alamat = '$_POST[alamat]' WHERE id_user='$id'");
    if (sql($update) == true) {
      echo "
      <script>
      alert('Data Profile berhasil diubah!');
      window.location.href='daftar_anggota.php';
      </script>
      ";
    } else {
      echo '
      <scrpit>
      alert("Data Profile gagal diubah!");
      </scrpit>
      ';
    }
  }

  ?>


  <script src="<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
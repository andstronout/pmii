<?php
session_start();
require "config.php";
if (!isset($_SESSION["login_anggota"])) {
    header("location:../login.php");
}
$sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_anggota]'");
$user = $sql_user->fetch_assoc();

include 'header.php';

if (isset($_POST["submit"])) {
    $id = $_SESSION["id_anggota"];
    $tanggal_pkd = $_POST["tanggal_pkd"];
    $tempat_pkd = $_POST["tempat_pkd"];

    if ($user['status'] == 'PKD') {
        echo "
                    <script>
                    alert('Anda telah terdaftar Menjadi PKD');
                    document.location.href='index.php';
                    </script>
                    ";
    } elseif ($user['status'] == 'Calon Anggota') {
        echo "
                    <script>
                    alert('Anda Harus Melakukan MAPABA Terlebih Dahulu');
                    document.location.href='index.php';
                    </script>
                    ";
    } elseif ($user['status'] == 'PKL') {
        echo "
                    <script>
                    alert('Anda telah terdaftar Menjadi PKL');
                    document.location.href='index.php';
                    </script>
                    ";
    } else {
        $tambah = sql("INSERT INTO pkd (id_user,tempat_pkd,tanggal_pkd) VALUES ('$id','$tanggal_pkd','$tempat_pkd')");
        $update = sql("UPDATE user SET pengajuan='yes' WHERE id_user=$id");

        echo "
            <script>
            alert('Pengajuan berhasil, silahkan hubungi admin');
            document.location.href='index.php';
            </script>
            ";
    }
}
?>
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">PKD</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="index.php#kaderisasi">Kaderisasi</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">PKD</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="img/about-img1.png" alt="" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Newsletter Start -->
<div class="container-fluid bg-primary newsletter py-5">
    <div class="container mb-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-6 px-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                <form action="" method="post">
                    <h1 class="text-white mb-4">Formulir Pendaftaran Mapaba</h1>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <label for="" class="mb-2 px-2 text-white">Nomor Induk Kewarganegaraan</label>
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Nomor Induk Kewarganegaraan" value="<?= $user['nik']; ?>" name="nik" style="height: 48px;" required>
                    </div>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <label for="" class="mb-2 px-2 text-white">Nomor Pokok Mahasiswa</label>
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Nomor Pokok Mahasiswa" value="<?= $user['npm']; ?>" name="npm" style="height: 48px;" required>
                    </div>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <label for="" class="mb-2 px-2 text-white">Nama Lengkap</label>
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Nama Lengkap" value="<?= $user['nama_user']; ?>" name="nama_user" style="height: 48px;" required>
                    </div>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <label for="" class="mb-2 px-2 text-white">Nomor Handphone</label>
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Nomor Handphone" value="<?= $user['nomor_hp']; ?>" name="nomor_hp" style="height: 48px;" required>
                    </div>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <label for="" class="mb-2 px-2 text-white">Tempat, Tanggal lahir</label>
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Tempat, Tanggal Lahir" value="<?= $user['ttl']; ?>" name="ttl" style="height: 48px;" required>
                    </div>
            </div>
            <div class="col-md-6 px-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Asal Kampus</label>
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Asal Kampus" value="<?= $user['asal_kampus']; ?>" name="asal_kampus" style="height: 48px;" required>
                </div>
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Alamat</label>
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Alamat" value="<?= $user['alamat']; ?>" name="alamat" style="height: 48px;" required>
                </div>
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Tanggal PKD</label>
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="date" placeholder="Masukan Tanggal" name="tanggal_pkd" style="height: 48px;" required>
                </div>
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Tempat PKD</label>
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukan Tempat PKD" name="tempat_pkd" style="height: 48px;" required>
                </div>
                <div class="position-relative w-100 mt-4 mb-2">
                    <button type="submit" name="submit" style="width: 520px;" class="btn btn-warning rounded-pill shadow-none position-absolute top-0 end-0 mt-1 me-2"><span class="text-white">Daftar PKD </span><i class="fa fa-paper-plane text-white fs-4 px-3"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        &copy; <a class="border-bottom" href="#">PMII Kabupaten Tangerang 2024</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

    </html>
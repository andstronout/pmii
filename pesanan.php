<?php
session_start();
require "config.php";
$conn = koneksi();
if (!isset($_SESSION["login_anggota"])) {
    header("location:../login.php");
}
$sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_anggota]'");
$user = $sql_user->fetch_assoc();
$sql_produk = sql("SELECT * FROM transaksi INNER JOIN produk ON transaksi.id_produk=produk.id_produk WHERE id_user='$_SESSION[id_anggota]'");

include 'header.php';

?>
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">Pesanan Anda</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="index.php#shop">Shop</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Pesanan</li>
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
        <div class="row g-5">
            <div class="col-md-12 px-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col">
                        <h3 class="text-white mb-4">Data Barang</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 align-self-end text-center text-lg-end">

                    </div>
                    <div class="col-3 align-self-center text-center">
                        <h5 class="text-white">Nama Barang</h5>
                    </div>
                    <div class="col-3 align-self-center text-center">
                        <h5 class="text-white">Harga Barang</h5>
                    </div>
                    <div class="col-3 align-self-center text-center">

                    </div>
                </div>
                <?php while ($produk = $sql_produk->fetch_assoc()) { ?>
                    <form action="" method="post?id=<?= $produk['id_transaksi']; ?>">
                        <div class="row mt-5">
                            <div class="col-lg-3 align-self-end text-center text-lg-end">
                                <img class="img-fluid" src="img/produk/<?= $produk['gambar_produk']; ?>" alt="" style="max-height: 300px;">
                            </div>
                            <div class="col-3 align-self-center text-center">
                                <h5 class="text-white"><?= $produk['nama_produk']; ?></h5>
                            </div>
                            <div class="col-3 align-self-center text-center">
                                <h5 class="text-white">Rp. <?= number_format($produk['harga_produk']); ?></h5>
                            </div>

                            <?php if ($produk['status_transaksi'] == "Belum Diproses") { ?>
                                <div class="col-3 align-self-center text-center">
                                    <button type="button" class="btn btn-info">
                                        Belum Diproses
                                    </button>
                                </div>
                            <?php } elseif ($produk['status_transaksi'] == "Sedang Diproses") { ?>
                                <div class="col-3 align-self-center text-center">
                                    <a href="pesanan_selesai.php?id=<?= $produk['id_transaksi']; ?>" class="btn btn-success" onclick="return confirm('Are you sure you?')">Terima Barang</a>
                                </div>
                            <?php } else { ?>
                                <div class="col-3 align-self-center text-center">
                                    <button type="button" class="btn btn-info">Transaksi Selesai</button>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                <?php } ?>
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
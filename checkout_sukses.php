<?php
session_start();
require "config.php";
if (!isset($_SESSION["login_anggota"])) {
    header("location:../login.php");
}
$sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_anggota]'");
$user = $sql_user->fetch_assoc();
$id = $_GET["id"];
$sql_transaksi = sql("SELECT * FROM transaksi WHERE id_transaksi ='$id'");
$transaksi = $sql_transaksi->fetch_assoc();


include 'header.php';

?>
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">Checkout Produk</h1>
                <p class="text-white">Nomor Transaksi Anda : <?= $transaksi['id_pesanan']; ?></p>
                <p class="text-white">Pesanan Anda akan segera di Proses</p>
                <a href="index.php" class="btn btn-success">Halaman Utama</a>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="img/about-img1.png" alt="" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

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
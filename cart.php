<?php
session_start();
require "config.php";
$conn = koneksi();
if (!isset($_SESSION["login_anggota"])) {
    header("location:../login.php");
}
$sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_anggota]'");
$user = $sql_user->fetch_assoc();
$idp = $_GET["id"];
$sql_produk = sql("SELECT * FROM produk WHERE id_produk='$idp'");
$produk = $sql_produk->fetch_assoc();

if (isset($_POST["submit"])) {
    $id_user = $_SESSION['id_anggota'];
    $id_produk = $idp;
    $tanggal_transaksi = date("y-m-d");
    $total_transaksi = $produk['harga_produk'];
    $komisariat = $_POST["komisariat"];
    $status = "Belum Diproses";
    $sumber = @$_FILES['bukti_bayar']['tmp_name'];
    $target = 'img/bukti_bayar/';
    $nama_bukti_bayar = @$_FILES['bukti_bayar']['name'];

    if (@$_FILES['bukti_bayar']['error'] > 0) {
        echo "
    <script>
    alert('Bukti Bayar Tidak Boleh Kosong!');
    </script>
    ";
    } else if (@$_FILES['bukti_bayar']['type'] != 'image/jpg' && @$_FILES['bukti_bayar']['type'] != 'image/png' && @$_FILES['bukti_bayar']['type'] != 'image/jpeg') {
        echo "
    <script>
    alert('Silahkan Upload Bukti Bayar Dengan Benar!');
    </script>
    ";
    } else {
        $pindah = move_uploaded_file($sumber, $target . $nama_bukti_bayar);
        $tambah_transaksi = $conn->query("INSERT INTO transaksi (id_user,id_produk,tanggal_transaksi,total_transaksi,bukti_bayar, ukuran,komisariat,status_transaksi) VALUES ('$id_user','$id_produk','$tanggal_transaksi','$total_transaksi','$nama_bukti_bayar','$_POST[ukuran]','$komisariat','$status') ");
        $id_transaksi = $conn->insert_id;
        $t = time();
        $id_pesanan = "KBTNG-" . $t;
        $update = sql("UPDATE transaksi SET id_pesanan='$id_pesanan' WHERE id_transaksi='$id_transaksi'");
        $url = "checkout_sukses.php?id=" . $id_transaksi;
        header("location:" . $url);
    }
}

include 'header.php';

?>
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">Checkout Produk</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="index.php#shop">Shop</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
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
            <div class="col-md-8 px-4 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                <form action="" method="post" enctype="multipart/form-data">
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
                    </div>
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
                        <div class="col-3 align-self-center text-center">
                            <select class="form-selectsm form-control border-0 rounded-pill w-100 ps-4 pe-5" name="ukuran" id="ukuran">
                                <option selected disabled>- Pilih Ukuran -</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>

                    </div>

            </div>
            <div class="col-md-4 px-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                <h3 class="text-white">Checkout Detail</h3>
                <div class=" alert alert-info mt-2 " role="alert">
                    Silahkan melakukan pembayaran pada <br>
                    BCA : 123123123 ( Rivaldo )<br>
                    Dana : 08123123123 <br><br>
                    <strong>Upload bukti transfer di bawah ini</strong>
                </div>
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Komisariat Pengambilan</label>
                    <select class="form-select-lg form-control border-0 rounded-pill w-100 ps-4 pe-5" aria-label="Default select example" required name="komisariat">
                        <option selected disabled>- Pilih Komisariat -</option>
                        <option value="Komisariat Universitas Insan Pembangunan">Komisariat Universitas Insan Pembangunan</option>
                        <option value="Komisariat Universitas Cendikia Abditama">Komisariat Universitas Cendikia Abditama</option>
                        <option value="Komisariat Universitas Tangerang Raya">Komisariat Universitas Tangerang Raya</option>
                    </select>
                </div>
                <div class="position-relative w-100 mt-3 mb-2">
                    <label for="" class="mb-2 px-2 text-white">Bukti Bayar</label>
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="file" name="bukti_bayar" style="height: 40px;" required>
                </div>
                <div class="col-md mt-4 mx-2 my-2  d-flex justify-content-end">
                    <a href="index.php" class="btn btn-success text-white mx-2">Halaman Keranjang</a>
                    <button type="submit" name="submit" class="btn btn-warning text-white">Proses Sekarang</button>
                    </form>
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
<?php
session_start();
require "config.php";
$sql_produk = sql("SELECT * FROM produk");

include "header.php";
?>




<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header mb-5">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">PMII Kabupaten Tangerang</h1>
                <p class="text-white mb-4 animated slideInRight">Progresif, Kreatif, Transformatif</p>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Read More</a>
                <a href="#Whatsapp" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="img/hero-img1.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
            <div class="modal-header border-0">
                <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                    <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container" id="about">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="img/about-img1.png">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                <h1 class="mb-4">Pergerakan Mahasiswa Islam Indonesia Kabupaten Tangerang</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                    amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                    clita duo justo et tempor eirmod magna dolore erat amet</p>
                <p class="mb-4">Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no
                    labore lorem sit. Sanctus clita duo justo et tempor.</p>
                <div class="d-flex align-items-center mt-4">
                    <a class="btn btn-primary rounded-pill px-4 me-3" href="">Contact Us</a>
                    <a class="btn btn-outline-primary btn-square me-3" href="https://www.instagram.com/pcpmiitangerang?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Kaderisasi Start -->
<div class="container-fluid bg-light mt-5 py-5" id="kaderisasi">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Kaderisasi</div>
                <h1 class="mb-4">Pelatihan Kaderisasi</h1>
                <p class="mb-4">Program pelatihan kaderisasi yang berlandaskan islam ahlussunah waljamaah</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">MAPABA</h5>
                                    <p>Masa Penerimaan Anggota Baru</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="mapaba.php">Daftar Sekarang</a>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">PKD</h5>
                                    <p>Pelatihan Kader Dasar</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="pkd.php">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">PKL</h5>
                                    <p>Pelatihan Kader Lanjut</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="pkl.php">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->



<!-- Shop Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5" id="shop">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Shop</div>
            <h2 class="mb-4">Atribut PMII Kabupaten Tangerang</h2>
        </div>
        <div class="row g-4">
            <!-- Sini -->
            <?php while ($produk = $sql_produk->fetch_assoc()) { ?>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/produk/<?= $produk['gambar_produk']; ?>" alt="">
                        <a class="case-overlay text-decoration-none" href="cart.php?id=<?= $produk['id_produk']; ?>">
                            <h5 class="lh-base text-white mb-3"><?= $produk['nama_produk']; ?>
                            </h5>
                            <small>Rp. <?= number_format($produk['harga_produk']); ?></small>

                            <span class="btn btn-primary">Checkout Sekarang <i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Case End -->


<!-- Team Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Team</div>
                <h1 class="mb-4">Pengurus Cabang <br>PMII Kabupaten Tangerang</h1>
                <p class="mb-4">Pengurus Cabang Pergerakan Mahasiswa Islam Indonesia Periode 2023-2024</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="team-item bg-white text-center rounded p-4 pt-0">
                                    <img class="img-fluid rounded-circle p-4" src="img/team-1.jpg" alt="">
                                    <h5 class="mb-0">Boris Johnson</h5>
                                    <small>Founder & CEO</small>
                                    <div class="d-flex justify-content-center mt-3">
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="team-item bg-white text-center rounded p-4 pt-0">
                                    <img class="img-fluid rounded-circle p-4" src="img/team-2.jpg" alt="">
                                    <h5 class="mb-0">Adam Crew</h5>
                                    <small>Executive Manager</small>
                                    <div class="d-flex justify-content-center mt-3">
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="team-item bg-white text-center rounded p-4 pt-0">
                                    <img class="img-fluid rounded-circle p-4" src="img/team-3.jpg" alt="">
                                    <h5 class="mb-0">Kate Winslet</h5>
                                    <small>Co Founder</small>
                                    <div class="d-flex justify-content-center mt-3">
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                <div class="team-item bg-white text-center rounded p-4 pt-0">
                                    <img class="img-fluid rounded-circle p-4" src="img/team-4.jpg" alt="">
                                    <h5 class="mb-0">Cody Gardner</h5>
                                    <small>Project Manager</small>
                                    <div class="d-flex justify-content-center mt-3">
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5">
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
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
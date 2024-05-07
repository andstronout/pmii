<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_admin"])) {
  header("location:../login.php");
}
$id = $_GET["id"];
$sql_anggota = sql("SELECT * FROM user WHERE `level`='1' AND id_user='$id'");
$anggota = $sql_anggota->fetch_assoc();
?>

<?php include "header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DETAIL NAMA ANGGOTA</h1>
  </div>

  <!-- Content Row -->
  <!-- Data Table -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <h5>NIK : <?= $anggota['nik']; ?></h5>
      <h5>Nomor Pokok Mahasiswa : <?= $anggota['npm']; ?></h5>
      <h5>Nama Lengkap : <?= $anggota['nama_user']; ?></h5>
      <h5>Email : <?= $anggota['email']; ?></h5>
      <h5>Nomor Handphone : <?= $anggota['nomor_hp']; ?></h5>
      <h5>Tempat, Tanggal Lahir : <?= $anggota['ttl']; ?></h5>
      <h5>Asal Kampus : <?= $anggota['asal_kampus']; ?></h5>
      <h5>Alamat : <?= $anggota['alamat']; ?></h5>
      <h5>Status : <?= $anggota['status']; ?></h5>
      <?php if ($anggota['pengajuan'] == 'no') { ?>
        <a href="daftar_anggota.php" class="btn btn-outline-secondary">Halaman Utama</a>
      <?php } elseif ($anggota['status'] == 'Calon Anggota') { ?>
        <a href="daftar_calon.php" class="btn btn-outline-secondary">Halaman Utama</a>
      <?php } elseif ($anggota['status'] == 'Mapaba') { ?>
        <a href="daftar_mapaba.php" class="btn btn-outline-secondary">Halaman Utama</a>
      <?php } elseif ($anggota['status'] == 'PKD') { ?>
        <a href="daftar_pkd.php" class="btn btn-outline-secondary">Halaman Utama</a>
      <?php } ?>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; PMII Kabupaten Tangerang 2024</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../sbadmin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../sbadmin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../sbadmin/js/demo/chart-area-demo.js"></script>
<script src="../sbadmin/js/demo/chart-pie-demo.js"></script>

<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excelHtml5',
          title: 'Data Pesanan Barang',
          exportOptions: {
            columns: [0, 1, 2]
          }
        },
        {
          extend: 'pdfHtml5',
          title: 'Data Pesanan Barang',
          exportOptions: {
            columns: [0, 1, 2]
          }
        }
      ]
    });
  });
</script>


</body>

</html>
<?php
require "config.php";
$id = $_GET["id"];
$ubah = sql("UPDATE transaksi SET status_transaksi='Transaksi Selesai' WHERE id_transaksi='$id'");
echo "
          <script>
          alert('Pesanan berhasil diterima');
          document.location.href='pesanan.php';
          </script>
          ";

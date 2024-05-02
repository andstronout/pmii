<?php
$id = $_GET["id"];
require "../config.php";
$hapus = sql("UPDATE user SET `status`='PKD', pengajuan='no' WHERE id_user='$id'");
echo "
            <script>
            alert('Anggota berhasil diterima');
            document.location.href='daftar_mapaba.php';
            </script>
            ";

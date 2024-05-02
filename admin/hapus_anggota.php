<?php
$id = $_GET["id"];
require "../config.php";
$hapus = sql("DELETE FROM user WHERE id_user='$id'");
echo "
            <script>
            alert('anggota berhasil dihapus');
            document.location.href='daftar_anggota.php';
            </script>
            ";

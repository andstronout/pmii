<?php
function koneksi()
{
  $conn = new mysqli('localhost', 'root', '', 'pmii') or die('Koneksi Gagal');
  return $conn;
}

function sql($sql)
{
  $conn = koneksi();
  $query = $conn->query($sql) or die(mysqli_error($conn));

  return $query;
}

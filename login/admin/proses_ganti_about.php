<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $about_us = $_POST['about_us'];
  $updateSql = "UPDATE about_section SET about_us='$about_us'";
  mysqli_query($koneksi, $updateSql);

  // Menampilkan alert biasa
  echo '
    <script>
      alert("About US berhasil diupdate.");
      window.history.back();
    </script>
  ';
}
?>

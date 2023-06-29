<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $isi_caption = $_POST['isi_caption'];
  $updateSql = "UPDATE caption_hero_section SET isi_caption='$isi_caption'";
  mysqli_query($koneksi, $updateSql);

  // Menampilkan alert biasa
  echo '
    <script>
      alert("Caption berhasil diupdate.");
      window.history.back(); // Kembali ke halaman sebelumnya
    </script>
  ';
}
?>

<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $warna_button = $_POST['warna_button'];
  $nomor_kontak = $_POST['nomor_kontak'];
  $email_kontak = $_POST['email_kontak'];
  $teks_button_hero = $_POST['teks_button_hero'];
  $updateSql = "UPDATE button_hero SET warna_button='$warna_button', nomor_kontak='$nomor_kontak', email_kontak='$email_kontak', teks_button_hero='$teks_button_hero'";
  mysqli_query($koneksi, $updateSql);
  echo '
    <script>
      alert("Button Hero berhasil diupdate.");
      window.history.back();
    </script>
  ';
}
?>

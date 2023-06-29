<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $linkFacebookBaru = $_POST['linkFacebookBaru'];
  $linkInstagramBaru = $_POST['linkInstagramBaru'];
  $linkYoutubeBaru = $_POST['linkYoutubeBaru'];
  $linkTiktokBaru = $_POST ['linktiktokBaru'];

  // Update data link sosmed ke database
  $updateSql = "UPDATE hero_area_social SET link_facebook = '$linkFacebookBaru', link_instagram = '$linkInstagramBaru', link_youtube = '$linkYoutubeBaru', link_tiktok='$linkTiktokBaru'";
  mysqli_query($koneksi, $updateSql);

  // Menampilkan alert
  echo '
  <script>
    alert("Link sosmed berhasil diperbarui.");
    window.history.back();
  </script>
  ';
  exit();
}
?>

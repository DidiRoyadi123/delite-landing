<?php
include_once "../sambungan.php";

if (isset($_POST['link_maps'])) {
  $link_maps = $_POST['link_maps'];
  $src_pattern = '/src="([^"]+)"/';

  // Menggunakan preg_match untuk mencocokkan pola dan mengambil isi dari src
  preg_match($src_pattern, $link_maps, $matches);
  $new_src = $matches[1];

  // Update link_maps di tabel 'maps'
  $sql_update_maps = "UPDATE maps SET link_maps = '$new_src'";
  $query_update_maps = mysqli_query($koneksi, $sql_update_maps);

  if ($query_update_maps) {
    // Alert berhasil diupdate dan redirect ke halaman sebelumnya
    echo '<script>alert("Link Maps berhasil diupdate."); window.location.href = document.referrer;</script>';
    exit();
  } else {
    // Alert gagal diupdate dan redirect ke halaman sebelumnya
    echo '<script>alert("Gagal mengupdate Link Maps. Silakan coba lagi."); window.location.href = document.referrer;</script>';
    exit();
  }
}
?>

<?php
// Pastikan file ini hanya bisa diakses melalui proses POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit;
}

include_once "../sambungan.php";

$id_service = $_POST['id_service'];
$judul_service = $_POST['judulServiceEdit' . $id_service];
$caption_service = $_POST['captionServiceEdit' . $id_service];

// Proses update data service
$sql_update_service = "UPDATE services SET judul_service = '$judul_service', caption_service = '$caption_service' WHERE id_service = '$id_service'";
$query_update_service = mysqli_query($koneksi, $sql_update_service);

if ($query_update_service) {
  // Redirect atau perbarui halaman setelah update berhasil
  echo '<script>alert("Service berhasil diupdate."); window.location.href = document.referrer;</script>';
  exit;
} else {
  echo '<script>alert("Terjadi kesalahan saat mengupdate service."); window.location.href = document.referrer;</script>';
}
?>

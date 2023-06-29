<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menerima data yang dikirimkan melalui form
  $id_kategori = $_POST['kategori_id'];
  $kategori_porto = $_POST['kategori_porto'];

  // Update data kategori di database
  $sql_update_kategori = "UPDATE kategori_portofolio SET kategori_porto = '$kategori_porto' WHERE kategori_id = '$id_kategori'";
  $query_update_kategori = mysqli_query($koneksi, $sql_update_kategori);

  if ($query_update_kategori) {
    // Redirect ke halaman sebelumnya setelah berhasil mengupdate data
    echo '<script>alert("Kategori berhasil diupdate."); window.location.href = document.referrer;</script>';
    exit;
  } else {
    // Tampilkan pesan error jika terjadi kesalahan saat mengupdate data
    echo '<script>alert("Terjadi kesalahan saat mengupdate kategori. Silakan coba lagi."); window.location.href = document.referrer;</script>';
  }
}
?>

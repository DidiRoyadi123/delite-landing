<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $apiKeyBaru = $_POST["apiKeyBaru"];
  $blogIdBaru = $_POST["blogIdBaru"];

  // Lakukan validasi atau manipulasi data jika diperlukan

  // Update data di database
  $sql_update = "UPDATE blogger SET api_key = '$apiKeyBaru', blog_id = '$blogIdBaru'";
  $query_update = mysqli_query($koneksi, $sql_update);

  if ($query_update) {
    echo '<script>alert("API_KEY DAN BLOG_ID berhasil diupdate."); window.location.href = document.referrer;</script>';

  } else {
    // Jika terjadi error saat update, tampilkan pesan error
    echo '<script>alert("Gagal mengunggah favicon. Silakan coba lagi."); window.location.href = document.referrer;</script>';
  }
}
?>

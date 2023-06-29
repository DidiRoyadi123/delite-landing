<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menerima data yang dikirimkan melalui form
  $kategori_porto = $_POST['kategori_porto'];

  // Insert data kategori ke database
  $sql_insert_kategori = "INSERT INTO kategori_portofolio (kategori_porto) VALUES ('$kategori_porto')";
  $query_insert_kategori = mysqli_query($koneksi, $sql_insert_kategori);

  if ($query_insert_kategori) {
    // Redirect ke halaman sebelumnya setelah berhasil menambahkan data
    echo '<script>alert("Kategori berhasil ditambahkan."); window.location.href = document.referrer;</script>';
    exit;
  } else {
    // Tampilkan pesan error jika terjadi kesalahan saat menambahkan data
    echo '<script>alert("Terjadi kesalahan saat menambahkan kategori. Silakan coba lagi."); window.location.href = document.referrer;</script>';
  }
}
?>

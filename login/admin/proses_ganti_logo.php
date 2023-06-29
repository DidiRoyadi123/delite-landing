<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Proses upload dan menyimpan logo
  $targetDir = "../../assets/img/";
  $logoName = $_FILES['logoBaru']['name'];
  $logoName = str_replace(" ", "_", $logoName); // Mengganti spasi dengan karakter "_"
  $targetPath = $targetDir . $logoName;

  if (move_uploaded_file($_FILES['logoBaru']['tmp_name'], $targetPath)) {
    // Update nama logo dan path logo ke dalam database
    $sql_logo = "SELECT nama_logo FROM logo";
    $query_logo = mysqli_query($koneksi, $sql_logo);
    $fetch_logo = mysqli_fetch_assoc($query_logo);
    if (isset($fetch_logo['nama_logo'])) {
      // Jika nama logo sudah ada, lakukan update
      $updateSql = "UPDATE logo SET nama_logo='$logoName', lokasi_logo='$targetPath'";
    } else {
      // Jika nama logo belum ada, lakukan insert
      $updateSql = "INSERT INTO logo (nama_logo, lokasi_logo) VALUES ('$logoName', '$targetPath')";
    }
    mysqli_query($koneksi, $updateSql);
    echo '
    <script>
      alert("Logo berhasil diupdate.");
      window.history.back();
    </script>
  ';
  } else {
    echo '
    <script>
      alert("Gagal mengunggah logo. Silakan coba lagi.");
      window.history.back(); // Kembali ke halaman sebelumnya
    </script>
  ';
  }
}
?>

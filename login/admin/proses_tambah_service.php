<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judulServiceBaru = $_POST["judulServiceBaru"];
  $captionServiceBaru = $_POST["captionServiceBaru"];

  // Mengambil informasi file gambar yang diunggah
  $gambarServiceBaru = $_FILES["gambarServiceBaru"];
  $namaGambar = $gambarServiceBaru["name"];
  $ukuranGambar = $gambarServiceBaru["size"];
  $lokasiSementara = $gambarServiceBaru["tmp_name"];
  $lokasiTujuan = "../../assets/img/" . $namaGambar;

  // Pindahkan gambar ke folder tujuan
  if (move_uploaded_file($lokasiSementara, $lokasiTujuan)) {
    // Simpan informasi gambar ke dalam database
    $sql = "INSERT INTO services (gambar_service, judul_service, caption_service) VALUES ('$lokasiTujuan', '$judulServiceBaru', '$captionServiceBaru')";
    if (mysqli_query($koneksi, $sql)) {
        echo '<script>alert("berhasil tambah service"); window.location.href = document.referrer;</script>';
    } else {
      echo "Error: " . mysqli_error($koneksi);
    }
  }
}
?>

<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menerima data yang dikirimkan melalui form
  $pertanyaan_faq_section = $_POST['pertanyaan_faq_section'];
  $jawabanfaq_sectionEdit = $_POST['jawabanfaq_sectionEdit'];

  // Insert data FAQ ke database
  $sql_insert_faq_section = "INSERT INTO faq_section (pertanyaan_faq, jawaban_faq) VALUES ('$pertanyaan_faq_section', '$jawabanfaq_sectionEdit')";
  $query_insert_faq_section = mysqli_query($koneksi, $sql_insert_faq_section);

  if ($query_insert_faq_section) {
    // Redirect ke halaman FAQ setelah berhasil menambahkan data
    echo '<script>alert("berhasil tambah FAQ"); window.location.href = document.referrer;</script>';
    exit;
  } else {
    // Tampilkan pesan error jika terjadi kesalahan saat menambahkan data
    echo '<script>alert("Terjadi kesalahan saat menambahkan data FAQ. Silakan coba lagi."); window.location.href = document.referrer;</script>';
  }
}
?>


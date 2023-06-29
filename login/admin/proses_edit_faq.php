<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menerima data yang dikirimkan melalui form
  $id_faq_section = $_POST['id_faq_section'];
  $pertanyaanfaq_sectionEdit = $_POST['pertanyaanfaq_sectionEdit'];
  $jawabanfaq_sectionEdit = $_POST['jawabanfaq_sectionEdit'];

  // Update data FAQ ke database
  $sql_update_faq_section = "UPDATE faq_section SET pertanyaan_faq = '$pertanyaanfaq_sectionEdit', jawaban_faq = '$jawabanfaq_sectionEdit' WHERE faq_id = $id_faq_section";
  $query_update_faq_section = mysqli_query($koneksi, $sql_update_faq_section);

  if ($query_update_faq_section) {
    // Redirect ke halaman FAQ setelah berhasil melakukan edit
    echo '<script>alert("FAQ berhasil diupdate."); window.location.href = document.referrer;</script>';
    exit;
  } else {
    echo '<script>alert("Terjadi kesalahan saat mengupdate data FAQ. Silakan coba lagi."); window.location.href = document.referrer;</script>';
    // Tampilkan pesan error jika terjadi kesalahan saat mengupdate data
    echo "";
  }
}
?>

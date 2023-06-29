<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $established = $_POST['established'];
  $happy_client = $_POST['happy_client'];
  $active_client = $_POST['active_client'];
  $success_client = $_POST['success_client'];

  // Update data customer section di tabel
  $sql_update_customer = "UPDATE customer_section SET established = '$established', happy_client = '$happy_client', active_client = '$active_client', success_client = '$success_client'";
  $query_update_customer = mysqli_query($koneksi, $sql_update_customer);

  if ($query_update_customer) {
    // Redirect atau perbarui halaman setelah update berhasil
    echo '<script>alert("Customer section berhasil diupdate."); window.location.href = document.referrer;</script>';
    exit;
  } else {
    echo "Terjadi kesalahan saat mengupdate customer section";
  }
}
?>

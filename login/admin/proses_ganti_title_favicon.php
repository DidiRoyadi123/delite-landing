<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Proses upload dan menyimpan favicon
  $targetDir = "../../assets/img/";
  $faviconName = $_FILES['FaviconBaru']['name'];
  $faviconName = str_replace(" ", "_", $faviconName );
  $targetPath = $targetDir . $faviconName;

  if (move_uploaded_file($_FILES['FaviconBaru']['tmp_name'], $targetPath)) {
    // Update nama favicon dan path favicon ke dalam database
    $sql_title_favicon = "SELECT lokasi_favicon, title FROM title_favicon";
    $query_title_favicon = mysqli_query($koneksi, $sql_title_favicon);
    $fetch_title_favicon = mysqli_fetch_assoc($query_title_favicon);

    if (isset($_POST['TitleBaru'])) {
      $titleBaru = $_POST['TitleBaru'];
    } else {
      $titleBaru = $fetch_title_favicon['title'];
    }

    if (isset($fetch_title_favicon['lokasi_favicon'])) {
      // Jika favicon sudah ada, lakukan update
      $updateSql = "UPDATE title_favicon SET title='$titleBaru', lokasi_favicon='$targetPath'";
    } else {
      // Jika favicon belum ada, lakukan insert
      $updateSql = "INSERT INTO title_favicon (title, lokasi_favicon) VALUES ('$titleBaru', '$targetPath')";
    }
    
    mysqli_query($koneksi, $updateSql);
    
    echo '<script>alert("Title dan favicon berhasil diupdate."); window.location.href = document.referrer;</script>';
  } else {
    echo '<script>alert("Gagal mengunggah favicon. Silakan coba lagi."); window.location.href = document.referrer;</script>';
  }
}
?>

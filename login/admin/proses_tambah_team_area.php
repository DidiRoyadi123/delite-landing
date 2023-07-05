<?php
include_once "../sambungan.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nama_team = $_POST['nama_team'];
   $jabatan_team = $_POST['jabatan_team'];
   $lokasi_img = $_FILES['lokasi_img']['name'];

   // Tentukan direktori penyimpanan file
   $upload_dir = '../../assets/img/';

   // Proses tambah data team_area
   $sql_tambah_team_area = "INSERT INTO team_area (nama_team, jabatan_team, lokasi_img) VALUES ('$nama_team', '$jabatan_team', CONCAT('$upload_dir', '$lokasi_img'))";
   $query_tambah_team_area = mysqli_query($koneksi, $sql_tambah_team_area);

   if ($query_tambah_team_area) {
      // Jika ada file gambar yang diunggah, proses file gambar
      if (!empty($lokasi_img)) {
         $file_tmp = $_FILES['lokasi_img']['tmp_name'];

         // Pindahkan file gambar ke direktori penyimpanan
         if (move_uploaded_file($file_tmp, $upload_dir . $lokasi_img)) {
            // Redirect atau perbarui halaman setelah data berhasil ditambahkan
            echo '<script>alert("Data team area berhasil ditambahkan."); window.location.href = document.referrer;</script>';
            exit;
         } else {
            echo '<script>alert("Terjadi kesalahan saat mengunggah file gambar."); window.location.href = document.referrer;</script>';
            exit;
         }
      } else {
         // Redirect atau perbarui halaman setelah data berhasil ditambahkan
         echo '<script>alert("Data team area berhasil ditambahkan."); window.location.href = document.referrer;</script>';
         exit;
      }
   } else {
      echo '<script>alert("Terjadi kesalahan saat menambahkan data team area."); window.location.href = document.referrer;</script>';
      exit;
   }
} else {
   // Jika bukan metode POST, redirect atau kembalikan ke halaman sebelumnya
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit;
}
?>

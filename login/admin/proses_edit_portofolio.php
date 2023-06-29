<?php
include_once "../sambungan.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $porto_id = $_POST['porto_id'];
   $kategori_id = $_POST['kategori_id'];
   $nama_kegiatan = $_POST['nama_kegiatan'];

   // Proses update data portofolio
   $sql_update_portofolio = "UPDATE portofolio SET kategori_id = '$kategori_id', nama_kegiatan = '$nama_kegiatan' WHERE porto_id = '$porto_id'";
   $query_update_portofolio = mysqli_query($koneksi, $sql_update_portofolio);

   if ($query_update_portofolio) {
      // Jika ada file gambar yang diunggah, proses file gambar
      if (!empty($_FILES['lokasi_img']['name'])) {
         $file_name = $_FILES['lokasi_img']['name'];
         $file_tmp = $_FILES['lokasi_img']['tmp_name'];
         $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

         // Tentukan direktori penyimpanan file
         $upload_dir = '../../assets/img/';

         // Generate nama unik untuk file gambar
         $new_file_name = uniqid('img_', true) . '.' . $file_ext;

         // Pindahkan file gambar ke direktori penyimpanan
         if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
            // Update lokasi_img dengan direktori dan nama file yang baru di database
            $new_location = $upload_dir . $new_file_name;
            $sql_update_lokasi_img = "UPDATE portofolio SET lokasi_img = '$new_location' WHERE porto_id = '$porto_id'";
            $query_update_lokasi_img = mysqli_query($koneksi, $sql_update_lokasi_img);

            if (!$query_update_lokasi_img) {
               echo '<script>alert("Terjadi kesalahan saat memperbarui lokasi gambar."); window.location.href = document.referrer;</script>';
               exit;
            }
         } else {
            echo '<script>alert("Terjadi kesalahan saat mengunggah file gambar."); window.location.href = document.referrer;</script>';
            exit;
         }
      }

      // Redirect atau perbarui halaman setelah update berhasil
      echo '<script>alert("Data portofolio berhasil diperbarui."); window.location.href = document.referrer;</script>';
      exit;
   } else {
      echo '<script>alert("Terjadi kesalahan saat memperbarui data portofolio."); window.location.href = document.referrer;</script>';
   }
} else {
   // Jika bukan metode POST, redirect atau kembalikan ke halaman sebelumnya
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit;
}
?>

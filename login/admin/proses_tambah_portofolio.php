<?php
include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Menerima data yang dikirimkan melalui form
   $kategori_id = $_POST['kategori_id'];
   $lokasi_img = $_FILES['lokasi_img']['name'];
   $nama_kegiatan = $_POST['nama_kegiatan'];

   // Tentukan direktori penyimpanan file gambar
   $target_dir = "../../assets/img/";
   $target_file = $target_dir . basename($_FILES["lokasi_img"]["name"]);

   // Cek apakah file gambar sudah dipilih
   if ($_FILES['lokasi_img']['size'] > 0) {
      // Upload file gambar
      if (move_uploaded_file($_FILES["lokasi_img"]["tmp_name"], $target_file)) {
         // Insert data portofolio ke database
         $sql_insert_portofolio = "INSERT INTO portofolio (kategori_id,lokasi_img, nama_kegiatan) VALUES ('$kategori_id', '$target_file','$nama_kegiatan')";
         $query_insert_portofolio = mysqli_query($koneksi, $sql_insert_portofolio);

         if ($query_insert_portofolio) {
            // Redirect ke halaman portofolio setelah berhasil menambahkan data
            echo '<script>alert("Berhasil tambah Portofolio"); window.location.href = document.referrer;</script>';
            exit;
         } else {
            // Tampilkan pesan error jika terjadi kesalahan saat menambahkan data
            echo '<script>alert("Terjadi kesalahan saat menambahkan data Portofolio. Silakan coba lagi."); window.location.href = document.referrer;</script>';
         }
      } else {
         // Tampilkan pesan error jika terjadi kesalahan saat mengupload gambar
         echo '<script>alert("Terjadi kesalahan saat mengupload gambar. Silakan coba lagi."); window.location.href = document.referrer;</script>';
      }
   } else {
      // Tampilkan pesan error jika file gambar tidak dipilih
      echo '<script>alert("Harap pilih file gambar."); window.location.href = document.referrer;</script>';
   }
}
?>

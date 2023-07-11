<?php
    include_once "../sambungan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $id_showreel = $_POST['id_showreel'];
    $judul_showreel = $_POST['judul_showreel'];
    $deskripsi_showreel = $_POST['deskripsi_showreel'];
    $link_showreel = $_POST['link_showreel'];

    // Cek apakah link sudah dalam format yang diinginkan
    if (strpos($link_showreel, 'https://www.youtube.com/embed/') === 0) {
        $formatted_link = $link_showreel;
    } else {
        // Ambil ID dari link YouTube
        $youtube_id = '';

        if (strpos($link_showreel, 'youtu.be/') !== false) {
            $youtube_id = substr($link_showreel, strpos($link_showreel, 'youtu.be/') + 9);
        } elseif (strpos($link_showreel, 'youtube.com/watch?v=') !== false) {
            $youtube_id = substr($link_showreel, strpos($link_showreel, 'youtube.com/watch?v=') + 20);
        }

        // Buat link yang diformat untuk dimasukkan ke dalam database
        $formatted_link = "https://www.youtube.com/embed/$youtube_id";
    }

    // Proses update data showreel
    $sql_update_showreel = "UPDATE showreel_section SET judul_showreel = '$judul_showreel', deskripsi_showreel = '$deskripsi_showreel', link_showreel = '$formatted_link' WHERE id_showreel = '$id_showreel'";
    $query_update_showreel = mysqli_query($koneksi, $sql_update_showreel);

    if ($query_update_showreel) {
        // Redirect atau perbarui halaman setelah berhasil mengupdate data
        echo '<script>alert("Data showreel berhasil diupdate."); window.location.href = document.referrer;</script>';
        exit;
    } else {
        echo '<script>alert("Terjadi kesalahan saat mengupdate data showreel."); window.location.href = document.referrer;</script>';
    }
}
?>

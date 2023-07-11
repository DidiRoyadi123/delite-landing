<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil nilai yang dikirimkan melalui form
    $judul_showreel = $_POST['judul_showreel'];
    $deskripsi_showreel = $_POST['deskripsi_showreel'];
    $link_showreel = $_POST['link_showreel'];

    // Ambil ID dari link YouTube
    $youtube_id = '';

    if (strpos($link_showreel, 'youtu.be/') !== false) {
        $youtube_id = substr($link_showreel, strpos($link_showreel, 'youtu.be/') + 9);
    } elseif (strpos($link_showreel, 'youtube.com/watch?v=') !== false) {
        $youtube_id = substr($link_showreel, strpos($link_showreel, 'youtube.com/watch?v=') + 20);
    } elseif (strpos($link_showreel, 'youtube.com/embed/') !== false) {
        $youtube_id = substr($link_showreel, strpos($link_showreel, 'youtube.com/embed/') + 18);
    }

    // Buat link yang diformat untuk dimasukkan ke dalam database
    $formatted_link = "https://www.youtube.com/embed/$youtube_id";

    // Lakukan proses tambah showreel ke dalam database
    include_once "../sambungan.php";
    $sql_tambah_showreel = "INSERT INTO showreel_section (judul_showreel, deskripsi_showreel, link_showreel) VALUES ('$judul_showreel', '$deskripsi_showreel', '$formatted_link')";
    $query_tambah_showreel = mysqli_query($koneksi, $sql_tambah_showreel);

    if ($query_tambah_showreel) {
        // Redirect atau perbarui halaman setelah tambah berhasil
        echo '<script>alert("Showreel berhasil ditambahkan."); window.location.href = document.referrer;</script>';
        exit;
    } else {
        echo '<script>alert("Terjadi kesalahan saat menambahkan showreel."); window.location.href = document.referrer;</script>';
    }
} else {
    // Jika form tidak disubmit, redirect atau perbarui halaman
    echo '<script>alert("Form tidak valid."); window.location.href = document.referrer;</script>';
}
?>

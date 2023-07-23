<?php
include "sesi.php";
if (isset($_POST['simpan'])) {
    include "../sambungan.php";

    $pengguna = $_POST['username'];
    $sandi = md5(trim($_POST['password']));
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $hp = $_POST['hp'];
    $surel = $_POST['surel'];
    $hakakses = $_POST['hakakses'];
    $aktif = $_POST['aktif'];
    $foto = $_FILES['foto'];

    if ($foto['error'] === UPLOAD_ERR_OK) {
        $folder = "../gambar/pengguna/";
        $namafile = $foto['name'];
        move_uploaded_file($foto['tmp_name'], $folder . $namafile);
    } else {
        $namafile = "";
    }

    $sql = "INSERT INTO pengguna SET username=?, password=?, nama=?, jabatan=?, hp=?, email=?, hakakses=?, aktif=?, foto=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssssss", $pengguna, $sandi, $nama, $jabatan, $hp, $surel, $hakakses, $aktif, $namafile);

    if ($stmt->execute()) {
        header('Location:?m=admin&s=awal');
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("Data Gagal Ditambahkan.")';
        echo '</script>';
    }
} else {
    echo '<script>window.history.back()</script>';
}
?>

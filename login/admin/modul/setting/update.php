<?php
if (isset($_POST['simpan'])) {
    include "../sambungan.php";
    $id = $_POST['id'];
    $pengguna = $_POST['username'];
    $sandi = md5($_POST['password']);
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $hp = $_POST['hp'];
    $surel = $_POST['surel'];
    $hakakses = $_POST['hakakses'];
    $aktif = $_POST['aktif'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $namafile = $_FILES['foto']['name'];

    // Check if the file is an image
    if (!empty($lokasi)) {
        $tipefile = $_FILES['foto']['type'];
        $allowed_extensions = array('image/jpeg', 'image/png', 'image/gif');

        if (!in_array($tipefile, $allowed_extensions)) {
            echo "File uploaded is not an image. Please upload a valid image file.";
            exit();
        }

        // Move the uploaded image to the destination folder
        $folder = "../gambar/pengguna/";
        move_uploaded_file($lokasi, $folder . $namafile);
    }

    if (empty($_POST['password'])) {
        if (empty($lokasi)) {
            $sql = "UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan', hp='$hp', email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpengguna='$id'";
        } else {
            $sql = "UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan', hp='$hp', email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
        }
    } else {
        if (empty($lokasi)) {
            $sql = "UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan', hp='$hp', email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpengguna='$id'";
        } else {
            $sql = "UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan', hp='$hp', email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
        }
    }

    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        if ($id == $_SESSION['idkasis']) {
            $_SESSION['userkasis'] = $pengguna;
            $_SESSION['namakasis'] = $nama;
            $_SESSION['jabatankasis'] = $jabatan;
            $_SESSION['hakakseskasis'] = $hakakses;
            if (!empty($lokasi)) {
                $_SESSION['fotokasis'] = $namafile;
            }
        }
        header('Location: index.php?m=admin&s=awal');
    } else {
        echo "Failed to update data.";
        include "index.php?m=admin&s=awal";
        echo '<script language="JavaScript">';
        echo 'alert("Data Gagal diupdate.")';
        echo '</script>';
    }
} else {
    echo '<script>window.history.back()</script>';
}
?>

<?php
function UploadFoto($namafile, $folder, $ukuran)
{
    $fileupload = $folder . $namafile;
    // Simpan file ukuran asli
    move_uploaded_file($_FILES['foto']['tmp_name'], $fileupload);

    // Proses perubahan dimensi ukuran
    kecilkangambar($fileupload, $ukuran);
}

function kecilkangambar($gambar, $ukuran = 50)
{
    list($lebar1, $tinggi1) = getimagesize($gambar);

    $lebar2 = 0;
    $tinggi2 = 0;
    if ($ukuran > 0 && $lebar1 > $ukuran) {
        $lebar2 = $ukuran;
        $tinggi2 = ($lebar2 / $lebar1) * $tinggi1;
        $tinggi2 = round($tinggi2);
    } elseif ($ukuran > 0 && $tinggi1 > $ukuran) {
        $tinggi2 = $ukuran;
        $lebar2 = ($tinggi2 / $tinggi1) * $lebar1;
        $lebar2 = round($lebar2);
    }

    if ($lebar2 < $lebar1 || $tinggi2 < $tinggi1) {
        $im2 = imagecreatetruecolor($lebar2, $tinggi2);
        $im1 = imagecreatefromjpeg($gambar);
        imagecopyresized($im2, $im1, 0, 0, 0, 0, $lebar2, $tinggi2, $lebar1, $tinggi1);
        imagejpeg($im2, $gambar, 90);
        imagedestroy($im1);
        imagedestroy($im2);
    }
}
?>

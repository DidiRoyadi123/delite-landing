<?php
include_once "sambungan.php";

$sql_logo = "SELECT lokasi_logo, nama_logo FROM logo";
$stmt = mysqli_prepare($koneksi, $sql_logo);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $lokasi_logo, $nama_logo);
mysqli_stmt_fetch($stmt);
$ekstensi_logo = pathinfo($lokasi_logo, PATHINFO_EXTENSION);
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
if (in_array($ekstensi_logo, $allowed_extensions)) {
    $logo_utama = str_replace("../", "", $lokasi_logo);
} else {
    $logo_utama = "../assets/img/logo.png";
}
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .container button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }

        .container img {
            max-width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="../<?= $logo_utama ?>" alt="logo utama">
        <h1>Login Sebagai</h1>
        <a href="admin/index.php"><button>Admin</button></a>
        <a href="karyawan/index.php"><button>Karyawan</button></a>
        <a href="../">Kembali ke Halaman Utama</a>
    </div>
</body>

</html>

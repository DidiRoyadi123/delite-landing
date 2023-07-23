<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Login proyek SEMIRA | BKM UCIC";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'proyek': $aktif="proyek"; $judul="Modul proyek $jawal"; include "modul/proyek/index.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
}

?>

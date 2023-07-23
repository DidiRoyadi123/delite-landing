<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Admin DELITE";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'proyek': $aktif="Proyek"; $judul="Proyek $jawal"; include "modul/proyek/index.php"; break;
	case 'admin': $aktif="Admin"; $judul="Modul $jawal"; include "modul/administrator/index.php"; break;
	case 'setting': $aktif="setting"; $judul="Modul $jawal"; include "modul/setting/index.php"; break;
	case 'divisi': $aktif="divisi"; $judul="Modul divisi $jawal"; include "modul/divisi/index.php"; break;
	case 'karyawan': $aktif="karyawan"; $judul="Modul karyawan $jawal"; include "modul/karyawan/index.php"; break;
	case 'proyek': $aktif="proyek"; $judul="Modul proyek $jawal"; include "modul/proyek/index.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
}

?>

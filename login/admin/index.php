<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Admin DELITE";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'admin': $aktif="Admin"; $judul="Modul $jawal"; include "modul/administrator/index.php"; break;
	case 'setting': $aktif="setting"; $judul="Modul $jawal"; include "modul/setting/index.php"; break;
	case 'kelas': $aktif="Kelas"; $judul="Modul Kelas $jawal"; include "modul/kelas/index.php"; break;
	case 'mahasiswa': $aktif="mahasiswa"; $judul="Modul mahasiswa $jawal"; include "modul/mahasiswa/index.php"; break;
	case 'dosenstaff': $aktif="dosenstaff"; $judul="Modul dosenstaff $jawal"; include "modul/dosenstaff/index.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
}

?>

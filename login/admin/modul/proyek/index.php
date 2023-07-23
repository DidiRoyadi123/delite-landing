<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/proyek/tampil.php"; break;
	case 'tambah': include "modul/proyek/tambah.php"; break;
	case 'simpan': include "modul/proyek/simpan.php"; break;
	case 'edit': include "modul/proyek/edit.php"; break;
	case 'update': include "modul/proyek/update.php"; break;
	case 'hapus': include "modul/proyek/hapus.php"; break;
	case 'detail': include "modul/proyek/detail.php"; break;
	case 'profil': include "modul/proyek/profil.php"; break;
}
?>

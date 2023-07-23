<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/divisi/tampil.php"; break;
	case 'tambah': include "modul/divisi/tambah.php"; break;
	case 'simpan': include "modul/divisi/simpan.php"; break;
	case 'edit': include "modul/divisi/edit.php"; break;
	case 'update': include "modul/divisi/update.php"; break;
	case 'hapus': include "modul/divisi/hapus.php"; break;
	case 'detail': include "modul/divisi/detail.php"; break;
	case 'profil': include "modul/divisi/profil.php"; break;
}
?>

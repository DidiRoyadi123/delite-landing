<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/karyawan/tampil.php"; break;
	case 'tambah': include "modul/karyawan/tambah.php"; break;
	case 'simpan': include "modul/karyawan/simpan.php"; break;
	case 'edit': include "modul/karyawan/edit.php"; break;
	case 'update': include "modul/karyawan/update.php"; break;
	case 'hapus': include "modul/karyawan/hapus.php"; break;
	case 'detail': include "modul/karyawan/detail.php"; break;
	case 'profil': include "modul/karyawan/profil.php"; break;
}
?>

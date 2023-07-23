<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/proyek/profil.php"; break;
	case 'edit': include "modul/proyek/edit.php"; break;
	case 'update': include "modul/proyek/update.php"; break;
	case 'profil': include "modul/proyek/profil.php"; break;
	case 'pilihan': include "modul/proyek/pilihan.php"; break;
}
?>

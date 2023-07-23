<?php
if(isset($_GET['id'])){
	include "../sambungan.php";
	$id=$_GET['id'];
	$sql   = "DELETE FROM divisi WHERE iddivisi='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location: ?m=divisi");
	}else{
		include "index.php?m=divisi&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Dihapus.")';
		echo '</script>';
	}
}
?>

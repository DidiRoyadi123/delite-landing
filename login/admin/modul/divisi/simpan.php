<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$divisi	=$_POST['divisi'];
	$jumlah	=$_POST['jumlah'];

	$sql="INSERT INTO divisi SET divisi='$divisi', jumlah='$jumlah'";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=divisi&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=divisi&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>

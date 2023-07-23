<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$divisi=$_POST['divisi'];
	$jumlah	=$_POST['jumlah'];

	$sql="UPDATE divisi SET divisi='$divisi', jumlah='$jumlah' WHERE iddivisi='$id'";
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=divisi&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=divisi&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>

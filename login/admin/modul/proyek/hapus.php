<?php
if(isset($_GET['nip'])){
	include "../sambungan.php";
	$id=$_GET['nip'];
	$sql   = "SELECT * FROM proyek WHERE nip='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/proyek/$foto");
		$sql   = "DELETE FROM proyek WHERE nip='$id'";
	}else{
		$sql   = "DELETE FROM proyek WHERE nip='$id'";
	}
		
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data divisi Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=proyek");
	}else{
		echo 'Data divisi GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>

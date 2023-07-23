<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Delite
        <small>PT Himbar buana wibawa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=divisi"><i class="fa fa-laptop"></i> divisi</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			  <a href="?m=divisi&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah divisi</a>
              <h3 class="box-title">Daftar divisi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="SEMIRA1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama divisi</th>
                  <th>Jumlah karyawan</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                
<?php
include "../sambungan.php";
$sql="SELECT * FROM divisi ORDER BY iddivisi";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
		echo "<td><a href='?m=divisi&s=detail&id=".$r['iddivisi']."'>".$r['divisi']."</a></td>";
		echo "<td>".$r['jumlah']."</td>";
		echo '<td><a href="index.php?m=divisi&s=edit&id='.$r['iddivisi'].'">Edit</a> | <a href="index.php?m=divisi&s=hapus&id='.$r['iddivisi'].'" onclick="return confirm(\'Yakin Akan dihapus?\')">Hapus</a></td>';
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama divisi</th>
                  <th>Jumlah karyawan</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php include "bawah.php"; ?>

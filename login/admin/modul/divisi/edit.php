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
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit divisi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['id'];
include "../sambungan.php";
$sql="SELECT * FROM divisi WHERE iddivisi='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=divisi&s=update" method="post" enctype="multipart/form-data">
              <table id="SEMIRA1" class="table table-bordered table-hover table-striped">
                <tbody>
					<input type="hidden" name="id" value="<?php echo$r['iddivisi'];?>" />
					<tr>
						<td width=150>Nama divisi*</td>
						<td><input type="text" name="divisi" placeholder="divisi" size="7px" maxlength="7px" value="<?php echo$r['divisi'];?>" required /></td>
					</tr>
					<tr>
						<td>Jumlah karyawan</td>
						<td><input type="text" name="jumlah" placeholder="Jumlah" size="5px" maxlength="2px" value="<?php echo$r['jumlah'];?>" /></td>
					</tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
						<a href="?m=divisi" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
					</tr>
                </tbody>
              </table>
			 </form>
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
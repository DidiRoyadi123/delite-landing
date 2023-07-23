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
        <li><a href="?m=karyawan"><i class="fa fa-laptop"></i> karyawan</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['nis'];
include "../sambungan.php";
$sql="SELECT karyawan.username, karyawan.nis, karyawan.nama, karyawan.jk, karyawan.tempatlahir, karyawan.tanggallahir, karyawan.hp, karyawan.email, karyawan.foto, karyawan.aktif, divisi.divisi FROM karyawan, divisi WHERE divisi.iddivisi=karyawan.iddivisi AND nis='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="SEMIRA1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Nama Pengguna</td>
						<td><?php echo$r['username'];?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td><?php echo$r['nama'];?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo $jk=$r['jk']=="L"?"Laki-laki":"Perempuan";?></td>
					</tr>
					<tr>
						<td>divisi</td>
						<td><?php echo$r['divisi'];?></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><?php echo$r['hp'];?></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><?php echo$r['email'];?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td><?php echo $r['tempatlahir'];?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><?php echo $r['tanggallahir'];?></td>
					</tr>
					<tr>
						<td>Aktif</td>
						<td><?php echo $r['aktif'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php 
						if ($r['foto']!=''){
						  echo "<img src=\"../gambar/karyawan/$r[foto]\" width=150 />";  
						}
						else{
						  echo "<img src=\"../gambar/karyawan/0.jpg\">";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=karyawan&s=edit&nis=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-times"></i> Edit</a>
						<a href="?m=karyawan" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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

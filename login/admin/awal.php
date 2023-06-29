<?php include "atas.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <style>
    .row.equal-height-cols {
      display: flex;
      flex-wrap: wrap;
    }

    .row.equal-height-cols [class*="col-"] {
      display: flex;
      flex-direction: column;
    }

    .row.equal-height-cols [class*="col-"]>div {
      flex: 1;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
    }

    .container>div {
      flex: 1 1 100%;
      display: flex;
      flex-direction: column;
      align-items: stretch;
    }

    .small-box {
      flex: 1 1 100%;
      display: flex;
      flex-direction: column;
    }

    .small-box-footer {
      margin-top: auto;
    }
  </style>
  <section class="content-header">
    <h1>
      Administrator Delite
      <small>Company Profile Delite</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row equal-height-cols">

      <!-- GANTI LOGO -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p><strong>Logo utama</strong></p>
            <?php
            include_once "../sambungan.php";
            $sql_logo = "SELECT lokasi_logo, nama_logo FROM logo";
            $query_logo = mysqli_query($koneksi, $sql_logo);
            $fetch_logo = mysqli_fetch_assoc($query_logo);

            if (!$fetch_logo) {
              // Jika tabel logo kosong, masukkan nama logo baru dan path logo
              $insertSql = "INSERT INTO logo (nama_logo, lokasi_logo) VALUES ('Nama Logo Baru', 'assets/img/nama_logo_baru.png')";
              mysqli_query($koneksi, $insertSql);
              $fetch_logo['nama_logo'] = 'Nama Logo Baru';
              $fetch_logo['lokasi_logo'] = 'assets/img/nama_logo_baru.png';
            }

            echo "<p>" . $fetch_logo['nama_logo'] . "</p>";
            ?>

            <div class="icon">
              <?php if ($fetch_logo['lokasi_logo']) { ?>
                <img src="<?php echo $fetch_logo['lokasi_logo']; ?>" alt="<?php echo $fetch_logo['nama_logo']; ?>" style="max-width: 50px;">
              <?php } else { ?>
                <i class="ion ion-book"></i>
              <?php } ?>
            </div>
          </div>
          <div class="icon">
            <i class="ion ion-acordion"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiLogoModal">Ganti logo <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Modal Ganti Logo -->
      <div class="modal fade" id="gantiLogoModal" tabindex="-1" role="dialog" aria-labelledby="gantiLogoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiLogoModalLabel">Ganti Logo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengunggah logo baru -->
              <form action="proses_ganti_logo.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="logoBaru">Pilih logo baru:</label>
                  <p>(Gunakan ukuran 595 x 195)</p>
                  <input type="file" class="form-control-file" id="logoBaru" name="logoBaru">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- HERO CAPTION -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p><strong>Hero Caption</strong></p>
            <?php
            $sql_caption_hero = "SELECT isi_caption FROM caption_hero_section";
            $query_caption_hero = mysqli_query($koneksi, $sql_caption_hero);
            $isi_caption = mysqli_fetch_assoc($query_caption_hero);
            echo "<p>" . $isi_caption['isi_caption'] . "</p>";
            ?>

          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiCaptionModal">Ganti Caption <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Modal Ganti Caption -->
      <div class="modal fade" id="gantiCaptionModal" tabindex="-1" role="dialog" aria-labelledby="gantiCaptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiCaptionModalLabel">Ganti Caption</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengganti caption -->
              <form action="proses_ganti_caption.php" method="POST">
                <div class="form-group">
                  <label for="isi_caption">Caption Baru:</label>
                  <?php
                  $sql_caption_hero = "SELECT isi_caption FROM caption_hero_section";
                  $query_caption_hero = mysqli_query($koneksi, $sql_caption_hero);
                  $isi_caption = mysqli_fetch_assoc($query_caption_hero);
                  ?>
                  <textarea class="form-control" id="isi_caption" name="isi_caption"><?php echo $isi_caption['isi_caption']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- WARNA UTAMA DAN BUTTON HERO -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php
            $sql_button_hero = "SELECT warna_button, nomor_kontak,email_kontak, teks_button_hero FROM button_hero";
            $query_button_hero = mysqli_query($koneksi, $sql_button_hero);
            $button = mysqli_fetch_assoc($query_button_hero);
            ?>
            <p><strong>Kontak dan Warna Web</strong></p>
            <p>Warna: <?= $button['warna_button'] ?></p>
            <div style="width: 100%; height: 20px; background-color: <?= $button['warna_button'] ?>; border: 1px solid black;"></div>
            <p>Nomor kontak: <?= $button['nomor_kontak'] ?></p>
            <p>Email : <?= $button['email_kontak'] ?></p>
            <p>Teks button hero: <?= $button['teks_button_hero'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiButtonModal">
            Ganti button dan warna <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- Modal Ganti Button Hero -->
      <div class="modal fade" id="gantiButtonModal" tabindex="-1" role="dialog" aria-labelledby="gantiButtonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiButtonModalLabel">Ganti Button dan warna utama</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengganti warna, nomor kontak, dan teks button -->
              <form action="proses_ganti_button.php" method="POST">
                <div class="form-group">
                  <label for="warna_button">Warna:</label>
                  <input type="color" class="form-control" id="warna_button" name="warna_button" value="<?php echo $button['warna_button']; ?>">
                </div>
                <div class="form-group">
                  <label for="nomor_kontak">Nomor Kontak:</label>
                  <input type="text" class="form-control" id="nomor_kontak" name="nomor_kontak" value="<?php echo $button['nomor_kontak']; ?>">
                </div>
                <div class="form-group">
                  <label for="email_kontak">Alamat Email:</label>
                  <input type="text" class="form-control" id="email_kontak" name="email_kontak" value="<?php echo $button['email_kontak']; ?>">
                </div>

                <div class="form-group">
                  <label for="teks_button_hero">Teks Button Hero:</label>
                  <input type="text" class="form-control" id="teks_button_hero" name="teks_button_hero" value="<?php echo $button['teks_button_hero']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- TITLE DAN FAVICON -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p>Title dan Favicon</p>
            <?php
            include_once "../sambungan.php";
            $sql_title_favicon = "SELECT lokasi_favicon, title FROM title_favicon";
            $query_title_favicon = mysqli_query($koneksi, $sql_title_favicon);
            $fetch_title_favicon = mysqli_fetch_assoc($query_title_favicon);

            if (!$fetch_title_favicon) {
              // Jika tabel logo kosong, masukkan nama logo baru dan path logo
              $insertSql = "INSERT INTO title_favicon (title, lokasi_favicon) VALUES ('Nama Logo Baru', 'assets/img/title_baru.png')";
              mysqli_query($koneksi, $insertSql);
              $fetch_title_favicon['title'] = 'Nama Logo Baru';
              $fetch_title_favicon['lokasi_favicon'] = 'assets/img/title_baru.png';
            }

            echo "<p> Title : " . $fetch_title_favicon['title'] . "</p>";
            ?>


            <?php if ($fetch_title_favicon['lokasi_favicon']) { ?>
              <img src="<?php echo $fetch_title_favicon['lokasi_favicon']; ?>" style="max-width: 50px;">
            <?php } else { ?>
              <i class="ion ion-graph"></i>
            <?php } ?>

          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiFaviconModal">Ganti title dan favicon <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Modal Ganti title dan favicon -->
      <div class="modal fade" id="gantiFaviconModal" tabindex="-1" role="dialog" aria-labelledby="gantiFaviconModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiFaviconModalLabel">Ganti Favicon dan title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengunggah title dan favicon baru -->
              <form action="proses_ganti_title_favicon.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="TitleBaru">Masukkan title baru:</label>
                  <input type="text" class="form-control" id="TitleBaru" value=" <?= $fetch_title_favicon['title'] ?>" name="TitleBaru">
                </div>
                <div class="form-group">
                  <label for="FaviconBaru">Pilih favicon baru:</label>
                  <span>*gunakan file ekstensi .ico</span>
                  <input type="file" class="form-control-file" id="FaviconBaru" name="FaviconBaru" accept=".ico">
                </div>

                <script>
                  document.getElementById('FaviconBaru').addEventListener('change', function() {
                    var fileInput = this;
                    var file = fileInput.files[0];
                    var fileExtension = file.name.split('.').pop().toLowerCase();

                    if (fileExtension !== 'ico') {
                      alert('File harus memiliki ekstensi .ico');
                      fileInput.value = '';
                    }
                  });
                </script>

                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- NAVIGASI SOSIAL -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p><strong>Navigasi Sosial</strong></p>
            <?php
            include_once "../sambungan.php";
            $sql_area_social = "SELECT link_facebook, link_instagram, link_youtube, link_tiktok FROM hero_area_social";
            $query_area_social = mysqli_query($koneksi, $sql_area_social);
            $fetch_area_social = mysqli_fetch_assoc($query_area_social);

            echo "<p> Status facebook : " . $fetch_area_social['link_facebook'] . "</p>";
            echo "<p> Status youtube : " . $fetch_area_social['link_youtube'] . "</p>";
            echo "<p> Status instagram : " . $fetch_area_social['link_instagram'] . "</p>";
            echo "<p> Status instagram : " . $fetch_area_social['link_tiktok'] . "</p>";
            ?>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiLinkSosmedModal">Ganti link Sosmed <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Modal Ganti link Sosmed -->
      <div class="modal fade" id="gantiLinkSosmedModal" tabindex="-1" role="dialog" aria-labelledby="gantiLinkSosmedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiLinkSosmedModalLabel">Ganti Link Sosmed</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengganti link sosmed -->
              <form action="proses_ganti_link_sosmed.php" method="POST">
                <div class="form-group">
                  <label for="linkFacebookBaru">Link Facebook:</label>
                  <input type="text" class="form-control" id="linkFacebookBaru" name="linkFacebookBaru" value="<?php echo $fetch_area_social['link_facebook']; ?>">
                </div>
                <div class="form-group">
                  <label for="linkInstagramBaru">Link Instagram:</label>
                  <input type="text" class="form-control" id="linkInstagramBaru" name="linkInstagramBaru" value="<?php echo $fetch_area_social['link_instagram']; ?>">
                </div>
                <div class="form-group">
                  <label for="linkYoutubeBaru">Link Youtube:</label>
                  <input type="text" class="form-control" id="linkYoutubeBaru" name="linkYoutubeBaru" value="<?php echo $fetch_area_social['link_youtube']; ?>">
                </div>
                <div class="form-group">
                  <label for="linktiktokBaru">Link tiktok:</label>
                  <input type="text" class="form-control" id="linktiktokBaru" name="linktiktokBaru" value="<?php echo $fetch_area_social['link_tiktok']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- INTEGRASI BLOGSPOT -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p> <strong>Integrasi blogspot</strong> </p>
            <?php
            include_once "../sambungan.php";
            $sql_blogger = "SELECT api_key, blog_id FROM blogger";
            $query_blogger = mysqli_query($koneksi, $sql_blogger);
            $fetch_blogger = mysqli_fetch_assoc($query_blogger);

            echo "<p> API_key : " . $fetch_blogger['api_key'] . "</p>";
            echo "<p> Blog_id : " . $fetch_blogger['blog_id'] . "</p>";
            ?>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantiBloggerModal">Ganti API dan blog id<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Modal Ganti API dan blog id -->
      <div class="modal fade" id="gantiBloggerModal" tabindex="-1" role="dialog" aria-labelledby="gantiBloggerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantiBloggerModalLabel">Ganti API dan blog id</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk mengganti API dan blog id -->
              <form action="proses_ganti_api_blog.php" method="POST">
                <div class="form-group">
                  <label for="apiKeyBaru">API Key:</label>
                  <input type="text" class="form-control" id="apiKeyBaru" name="apiKeyBaru" value="<?php echo $fetch_blogger['api_key']; ?>">
                </div>
                <div class="form-group">
                  <label for="blogIdBaru">Blog ID:</label>
                  <input type="text" class="form-control" id="blogIdBaru" name="blogIdBaru" value="<?php echo $fetch_blogger['blog_id']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- INTEGRASI GMAPS-->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <p> <strong>Integrasi MAPS</strong> </p>
            <?php
            include_once "../sambungan.php";
            $sql_maps = "SELECT link_maps FROM maps";
            $query_maps = mysqli_query($koneksi, $sql_maps);
            $fetch_maps = mysqli_fetch_assoc($query_maps);
            ?>
            <iframe src="<?= $fetch_maps['link_maps'] ?>" width="100%" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#gantimapsModal">Ganti Maps<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Modal Ganti Maps -->
      <div class="modal fade" id="gantimapsModal" tabindex="-1" role="dialog" aria-labelledby="gantimapsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="gantimapsModalLabel">Ganti Maps</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="proses_ganti_maps.php" method="POST">
                <div class="form-group">
                  <label for="link_maps">Link Maps Baru</label>
                  <input type="text" class="form-control" id="link_maps" name="link_maps" placeholder="Masukkan link maps baru" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- CUSTOMER SECTION -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <p><strong>CUSTOMER SECTION</strong></p>
            <?php
            include_once "../sambungan.php";
            $sql_customer = "SELECT established, happy_client, active_client, success_client FROM customer_section";
            $query_customer = mysqli_query($koneksi, $sql_customer);
            $fetch_customer = mysqli_fetch_assoc($query_customer);
            ?>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Established</strong></td>
                  <td><?php echo $fetch_customer['established']; ?></td>
                </tr>
                <tr>
                  <td><strong>Happy Client</strong></td>
                  <td><?php echo $fetch_customer['happy_client']; ?></td>
                </tr>
                <tr>
                  <td><strong>Active Client</strong></td>
                  <td><?php echo $fetch_customer['active_client']; ?></td>
                </tr>
                <tr>
                  <td><strong>Success Client</strong></td>
                  <td><?php echo $fetch_customer['success_client']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#ganticustomerModal">Ganti<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Modal ganti Customer -->
      <div class="modal fade" id="ganticustomerModal" tabindex="-1" role="dialog" aria-labelledby="ganticustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ganticustomerModalLabel">Ganti Customer Section</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk ganti data customer section -->
              <form action="proses_ganti_customer.php" method="POST">
                <div class="form-group">
                  <label for="established">Established:</label>
                  <input type="text" class="form-control" id="established" name="established" value="<?php echo $fetch_customer['established']; ?>">
                </div>
                <div class="form-group">
                  <label for="happy_client">Happy Client:</label>
                  <input type="text" class="form-control" id="happy_client" name="happy_client" value="<?php echo $fetch_customer['happy_client']; ?>">
                </div>
                <div class="form-group">
                  <label for="active_client">Active Client:</label>
                  <input type="text" class="form-control" id="active_client" name="active_client" value="<?php echo $fetch_customer['active_client']; ?>">
                </div>
                <div class="form-group">
                  <label for="success_client">Success Client:</label>
                  <input type="text" class="form-control" id="success_client" name="success_client" value="<?php echo $fetch_customer['success_client']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- SERVICE -->
      <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <p><strong>Services/Layanan</strong></p>
            <?php
            include_once "../sambungan.php";
            $sql_service = "SELECT id_service, gambar_service, judul_service, caption_service FROM services";
            $query_service = mysqli_query($koneksi, $sql_service);
            ?>
            <div class="tabelService">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($no = 1; $fetch_service = mysqli_fetch_assoc($query_service); $no++) {
                    $id_service = $fetch_service['id_service'];
                    $judul_service = $fetch_service['judul_service'];
                    $caption_service = $fetch_service['caption_service'];
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $judul_service ?></td>
                      <td class="text-center">
                        <form action="" method="POST">
                          <input type="hidden" name="id_service" value="<?= $id_service ?>">
                          <button type="submit" name="hapus_service" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editServiceModal<?= $id_service ?>">Edit</button>
                        </form>
                      </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editServiceModal<?= $id_service ?>" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel<?= $id_service ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editServiceModalLabel<?= $id_service ?>" style="color: black;">Edit Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- Form untuk edit data service -->
                            <form action="proses_edit_service.php" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden" class="form-control-file" id="id_service<?= $id_service ?>" name="id_service" >
                              </div>
                              <div class="form-group">
                                <label for="gambarServiceEdit<?= $id_service ?>" style="color: black;">Gambar Service:</label>
                                <input type="file" class="form-control-file" id="gambarServiceEdit<?= $id_service ?>" name="gambarServiceEdit">
                              </div>
                              <div class="form-group">
                                <label for="judulServiceEdit<?= $id_service ?>" style="color: black;">Judul Service:</label>
                                <input type="text" class="form-control" id="judulServiceEdit<?= $id_service ?>" name="judulServiceEdit" value="<?= $judul_service ?>">
                              </div>
                              <div class="form-group">
                                <label for="captionServiceEdit<?= $id_service ?>" style="color: black;">Caption Service:</label>
                                <textarea class="form-control" id="captionServiceEdit<?= $id_service ?>" name="captionServiceEdit"><?= $caption_service ?></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  if ($no === 1) {
                    echo "<tr><td colspan='3'>Tidak ada service</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#tambahserviceModal">Tambah service<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- HAPUS SERVICE -->
      <?php
      if (isset($_POST['hapus_service'])) {
        $id_service = $_POST['id_service'];
        // Lakukan proses hapus service sesuai dengan id_service yang diterima
        $sql_hapus_service = "DELETE FROM services WHERE id_service = '$id_service'";
        $query_hapus_service = mysqli_query($koneksi, $sql_hapus_service);
        if ($query_hapus_service) {
          // Redirect atau perbarui halaman setelah hapus berhasil
          echo '<script>alert("service berhasil dihapus."); window.location.href = document.referrer;</script>';
          exit;
        } else {
          echo '<script>alert("Terjadi kesalahan saat menghapus service."); window.location.href = document.referrer;</script>';
        }
      }
      ?>
      <!-- Modal Tambah Service -->
      <div class="modal fade" id="tambahserviceModal" tabindex="-1" role="dialog" aria-labelledby="tambahserviceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahserviceModalLabel">Tambah Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk menambah data service -->
              <form action="proses_tambah_service.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="gambarServiceBaru">Gambar Service:</label>
                  <input type="file" class="form-control-file" id="gambarServiceBaru" name="gambarServiceBaru">
                </div>
                <div class="form-group">
                  <label for="judulServiceBaru">Judul Service:</label>
                  <input type="text" class="form-control" id="judulServiceBaru" name="judulServiceBaru" value="">
                </div>
                <div class="form-group">
                  <label for="captionServiceBaru">Caption Service:</label>
                  <textarea class="form-control" id="captionServiceBaru" name="captionServiceBaru"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <p><strong>FAQ</strong></p>
            <?php
            include_once "../sambungan.php";
            $sql_faq_section = "SELECT faq_id, pertanyaan_faq, jawaban_faq FROM faq_section";
            $query_faq_section = mysqli_query($koneksi, $sql_faq_section);
            ?>
            <div class="tabelfaq_section">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($no = 1; $fetch_faq_section = mysqli_fetch_assoc($query_faq_section); $no++) {
                    $id_faq_section = $fetch_faq_section['faq_id'];
                    $pertanyaan_faq_section = $fetch_faq_section['pertanyaan_faq'];
                    $jawaban_faq_section = $fetch_faq_section['jawaban_faq'];
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $pertanyaan_faq_section ?></td>
                      <td class="text-center">
                        <form action="" method="POST">
                          <input type="hidden" name="id_faq_section" value="<?= $id_faq_section ?>">
                          <button type="submit" name="hapus_faq_section" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editfaq_sectionModal<?= $id_faq_section ?>">Edit</button>
                        </form>
                      </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editfaq_sectionModal<?= $id_faq_section ?>" tabindex="-1" role="dialog" aria-labelledby="editfaq_sectionModalLabel<?= $id_faq_section ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="color: black;" id="editfaq_sectionModalLabel<?= $id_faq_section ?>">Edit FAQ Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- Form untuk edit data faq_section -->
                            <form action="proses_edit_faq.php" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden" class="form-control-file" id="id_faq_section<?= $id_faq_section ?>" name="id_faq_section" value="<?= $id_faq_section ?>">
                              </div>
                              <div class="form-group">
                                <label for="pertanyaanfaq_sectionEdit<?= $id_faq_section ?>" style="color: black;">Pertanyaan:</label>
                                <input type="text" class="form-control" id="pertanyaanfaq_sectionEdit<?= $id_faq_section ?>" name="pertanyaanfaq_sectionEdit" value="<?= $pertanyaan_faq_section ?>">
                              </div>
                              <div class="form-group">
                                <label for="jawabanfaq_sectionEdit<?= $id_faq_section ?>" style="color: black;">Jawaban FAQ:</label>
                                <textarea class="form-control" id="jawabanfaq_sectionEdit<?= $id_faq_section ?>" name="jawabanfaq_sectionEdit"><?= $jawaban_faq_section ?></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  if ($no === 1) {
                    echo "<tr><td colspan='3'>Tidak ada faq_section</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <a href="#" class="small-box-footer" data-toggle="modal" data-target="#tambahfaq_sectionModal">Tambah FAQ<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- HAPUS faq -->
      <?php
      if (isset($_POST['hapus_faq_section'])) {
        $id_faq_section = $_POST['id_faq_section'];
        // Lakukan proses hapus faq sesuai dengan id_faq_section yang diterima
        $sql_hapus_faq_section = "DELETE FROM faq_section WHERE faq_id = '$id_faq_section'";
        $query_hapus_faq_section = mysqli_query($koneksi, $sql_hapus_faq_section);
        if ($query_hapus_faq_section) {
          // Redirect atau perbarui halaman setelah hapus berhasil
          echo '<script>alert("FAQ berhasil dihapus."); window.location.href = document.referrer;</script>';
          exit;
        } else {
          echo '<script>alert("Terjadi kesalahan saat menghapus FAQ."); window.location.href = document.referrer;</script>';
        }
      }
      ?>
      <!-- Modal Tambah FAQ -->
      <div class="modal fade" id="tambahfaq_sectionModal" tabindex="-1" role="dialog" aria-labelledby="tambahfaq_sectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahfaq_sectionModalLabel">Tambah FAQ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form untuk menambah data FAQ -->
              <form action="proses_tambah_faq.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="pertanyaan_faq_section">Pertanyaan :</label>
                  <input type="text" class="form-control" id="pertanyaan_faq_section" name="pertanyaan_faq_section" value="">
                </div>
                <div class="form-group">
                  <label for="jawabanfaq_sectionEdit">Jawaban FAQ:</label>
                  <textarea class="form-control" id="jawabanfaq_sectionEdit" name="jawabanfaq_sectionEdit"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "bawah.php"; ?>
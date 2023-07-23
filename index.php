<?php
include_once "login/sambungan.php";
$sql_logo = "SELECT lokasi_logo, nama_logo FROM logo";
$query_logo = mysqli_query($koneksi, $sql_logo);
$fetch_logo = mysqli_fetch_assoc($query_logo);
$logo_utama = str_replace("../../", "", $fetch_logo['lokasi_logo']);

$sql_caption_hero = "SELECT isi_caption FROM caption_hero_section";
$query_caption_hero = mysqli_query($koneksi, $sql_caption_hero);
$fetch_caption_hero = mysqli_fetch_assoc($query_caption_hero);

$sql_button_hero = "SELECT warna_button, nomor_kontak, email_kontak, teks_button_hero FROM button_hero";
$query_button_hero = mysqli_query($koneksi, $sql_button_hero);
$button = mysqli_fetch_assoc($query_button_hero);
$nomor_kontak = $button['nomor_kontak'];
$nomor_kontak = preg_replace('/^0/', '+62', $nomor_kontak);
$email_kontak = $button['email_kontak'];

$sql_title_favicon = "SELECT lokasi_favicon, title FROM title_favicon";
$query_title_favicon = mysqli_query($koneksi, $sql_title_favicon);
$fetch_title_favicon = mysqli_fetch_assoc($query_title_favicon);
$favicon = str_replace("../../", "", $fetch_title_favicon['lokasi_favicon']);

$sql_area_social = "SELECT link_facebook, link_instagram, link_youtube, link_tiktok FROM hero_area_social";
$query_area_social = mysqli_query($koneksi, $sql_area_social);
$fetch_area_social = mysqli_fetch_assoc($query_area_social);

$sql_blogger = "SELECT api_key, blog_id FROM blogger";
$query_blogger = mysqli_query($koneksi, $sql_blogger);
$fetch_blogger = mysqli_fetch_assoc($query_blogger);

$sql_service = "SELECT id_service, gambar_service, judul_service, caption_service FROM services";
$query_service = mysqli_query($koneksi, $sql_service);
$fetch_service = mysqli_fetch_assoc($query_service);
$gambar_service = str_replace("../../", "", $fetch_service['gambar_service']);

$sql_maps = "SELECT link_maps FROM maps";
$query_maps = mysqli_query($koneksi, $sql_maps);
$fetch_maps = mysqli_fetch_assoc($query_maps);

$sql_customer = "SELECT established, happy_client, active_client, success_client FROM customer_section";
$query_customer = mysqli_query($koneksi, $sql_customer);
$fetch_customer = mysqli_fetch_assoc($query_customer);

$sql_faq_section = "SELECT faq_id, pertanyaan_faq, jawaban_faq FROM faq_section";
$query_faq_section = mysqli_query($koneksi, $sql_faq_section);
$fetch_faq_section = mysqli_fetch_assoc($query_faq_section);

$sql_kategori_portofolio = "SELECT kategori_id, kategori_porto FROM kategori_portofolio";
$query_kategori_portofolio = mysqli_query($koneksi, $sql_kategori_portofolio);
$fetch_kategori_portofolio = mysqli_fetch_assoc($query_kategori_portofolio);

$sql_team_area = "SELECT * FROM team_area";
$query_team_area = mysqli_query($koneksi, $sql_team_area);

$sql_showreel_section = "SELECT judul_showreel, deskripsi_showreel, link_showreel FROM showreel_section";
$query_showreel_section = mysqli_query($koneksi, $sql_showreel_section);

$sql_about = "SELECT about_us FROM about_section";
$query_about = mysqli_query($koneksi, $sql_about);
$about_us = mysqli_fetch_assoc($query_about);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta Tags -->
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="author" content="themeholder">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Page Title -->
   <title><?= $fetch_title_favicon['title'] ?> </title>
   <!-- Favicon Icon -->
   <link rel="shortcut icon" type="image/png" href="<?php echo $fetch_title_favicon['lokasi_favicon']; ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-R5uBPFbCR9ED7GySp6z0Gc2Az+fMfmh1bX3f26NOevb9m+WnVEUujzuGvBbyO2h0jz6ilZl8+Ca3CjE/C0YJ2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Stylesheets -->
   <link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/animate.min.css">
   <link rel="stylesheet" href="assets/css/slicknav.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/fonts/flaticon.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/responsive.css">
   <style>
      @media screen and (max-width: 600px) {
         .logo {
            width: 30% !important;
         }
      }

      /* @ media screen tablet */
      @media screen and (min-width: 600px) and (max-width: 1024px) {
         .logo {
            width: 50% !important;
         }
      }

      .sticky #mobile-menu .slicknav_btn {
         padding: 10px 20px;
         padding-top: 6%;
      }

      .sticky .logo a img {
         width: 100% !important;
      }

      .section-padding {
         padding: 10px 0;
      }

      /* all warna Utama start*/
      .portfolio-menu ul li.active,
      .flaticon-right-quote::before,
      .owl-carousel .owl-nav>div:hover,
      .blog-content p span,
      .about-widget>ul>li>i,
      .widget-menu li a:hover,
      .breadcrumb-area ul li.active a,
      .latest-news-title p a:hover,
      .category li a:hover,
      .blog-posts-meta ul li i,
      .single-posts blockquote p i,
      .post-tags a:hover,
      .comment-box .comment-reply-button,
      .main-menu ul li a:hover,
      .main-menu ul li a.active,
      .work-icon i.flaticon-test::before,
      .counter-project h1 {
         color: <?= $button['warna_button'] ?> !important;
      }

      .single-team,
      .single-team:hover,
      .single-service:hover,
      .single-service {
         border: 1px solid <?= $button['warna_button'] ?> !important;
      }

      .viso-btn.read-more:hover,
      .post-share li a:hover,
      input[type="submit"],
      .section-title h2::after,
      .main-menu ul li a::before,
      .main-menu ul li a.active::before,
      .call-button,
      .viso-btn,
      .hero-area-social ul li a:hover,
      .dicover-list li:hover i,
      .owl-dots .owl-dot.active,
      .single-team:hover .tem-social,
      .pricing-table:hover .price-content .viso-btn.price,
      .price-swetch ul li a.active,
      .subscribe-form form button[type="submit"],
      .footer-social>ul>li>a:hover,
      ul.author-social li a:hover,
      .tags li a:hover,
      .scrollup,
      .owl-dot.active {
         background-color: <?= $button['warna_button'] ?> !important;
      }

      .owl-dot {
         background-color: <?= $button['warna_button'] ?>;
         opacity: 0.2;
      }

      #loader,
      #loader:before,
      #loader:after {
         border-top-color: <?= $button['warna_button'] ?> !important;
      }

      .logo {
         height: 80%;
         width: 100%;
         display: flex;
         align-items: center;
      }

      .logo a {
         height: 100%;
         display: flex;
         align-items: center;
      }

      .logo img {
         height: 100%;
         margin-right: 10px;
      }

      /* END all warna */
      /* FAQ */
      .faq-question,
      .faq-question:hover,
      .faq-question:focus,
      .faq-question:active,
      .btn-link,
      .btn-link:hover,
      .btn-link:focus,
      .btn-link:active,
      .btn-link[aria-expanded="true"] {
         color: <?= $button['warna_button'] ?> !important;
         text-decoration: none;
      }

      .btn-link {
         padding: 0;
      }

      /* img portofolio */
      .single-portfolio {
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .img-wrapper {
         display: flex;
         align-items: center;
         justify-content: center;
         height: 380px;
      }

      .img-wrapper img {
         max-width: 100%;
         max-height: 100%;
      }

      /* end img portofolio */

      .service-area,
      .testimonial-area,
      .contact-area,
      .map-area {
         padding: 100px 0;
      }

      /* tampilan youtube */
      .testimonial-area {
         padding: 60px 0;
      }

      .testimonial-active .single-testimonial {
         text-align: center;
         margin-bottom: 40px;
      }

      .testimonail-img iframe {
         width: 100%;
         height: 315px;
      }

      .testimonial-content h3 {
         margin-top: 20px;
         margin-bottom: 10px;
         font-weight: bold;
      }

      .testimonial-content p {
         margin-bottom: 20px;
      }

      @media screen and (min-width: 768px) {
         .testimonial-active .single-testimonial {
            display: flex;
            justify-content: center;
            align-items: center;
         }

         .testimonail-img {
            flex-basis: 40%;
         }

         .testimonial-content {
            flex-basis: 60%;
            padding-left: 40px;
         }
      }

      @media only screen and (max-width: 767px) {

         .testimonial-content {
            margin-top: 50px;
            width: 100%;
            padding: 0 10%;
         }

         .testimonail-img {
            width: 360px;
            height: 265px;
         }
      }

      @media only screen and (max-width: 390px) {
         .testimonial-content {
            margin-top: 10%;
            width: 100%;
         }

         .testimonail-img {
            width: 90%;
         }
      }
   </style>
</head>

<body>
   <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
   <!-- Main Content site -->
   <div class="main-site">
      <!--preloader  -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!--/End preloader  -->
      <!-- Header Area Start-->
      <header class="sticky-header">
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <div class="logo">
                     <a href="index.php">
                        <img src=<?= $logo_utama ?> alt="logo utama">
                     </a>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="main-menu float-right">
                     <nav>
                        <ul>
                           <li class="dropdown">
                              <a href="#" data-scroll-nav="0">Home</a>
                           </li>
                           <li><a href="#" data-scroll-nav="1">Customer</a></li>
                           <li><a href="#" data-scroll-nav="2">Services</a></li>
                           <!-- <li><a href="#" data-scroll-nav="3">Product</a></li> -->
                           <li><a href="#" data-scroll-nav="3">Blog</a></li>
                           <li><a href="#" data-scroll-nav="4">FAQ</a></li>
                           <li><a href="#" data-scroll-nav="5">Contact</a></li>
                        </ul>
                     </nav>
                  </div>
                  <div id="mobile-menu"></div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Area End!-->
      <!-- Start Hero  -->
      <div class="hero-area" data-scroll-index="0">
         <div class="single-hero">
            <div class="hero-wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <div class="hero-content">
                           <h1><?= $fetch_caption_hero['isi_caption'] ?>
                           </h1>
                           <a class="viso-btn hero" style="background-color: <?= $button['warna_button'] ?>;" target="_blank" href="https://wa.me/<?= $nomor_kontak ?>"><?= $button['teks_button_hero'] ?></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="hero-area-social">
                  <ul>
                     <li><a href="<?= $fetch_area_social['link_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="<?= $fetch_area_social['link_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="<?= $fetch_area_social['link_youtube'] ?>"><i class="fa fa-youtube"></i></a></li>
                     <li><a href="<?= $fetch_area_social['link_tiktok'] ?>"><i class="fab fa-tiktok"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                 <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                              </svg></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- /End Hero  -->
      <!-- Work Progress -->
      <!-- <div class="work-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2 col-md-8">
                  <div class="section-title text-center">
                     <h2>Our Work Process</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim ad minim.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="single-work">
                     <div class="work-icon">
                        <i class="flaticon-test"></i>
                     </div>
                     <h2>Research Design</h2>
                     <p>Lorem Seamless integration across all digital media channels with nced targeting full combined.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-work">
                     <div class="work-icon two">
                        <i class="flaticon-plan"></i>
                     </div>
                     <h2>making wireframe</h2>
                     <p>Lorem Seamless integration across all digital media channels with nced targeting full combined.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-work">
                     <div class="work-icon three">
                        <i class="flaticon-ux"></i>
                     </div>
                     <h2>Final UI Design</h2>
                     <p>Lorem Seamless integration across all digital media channels with nced targeting full combined.</p>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- /End Work Progress -->
      <!-- Discover Area -->
      <div class="discover-area section-padding">
         <div class="container">
            <!-- <div class="row">
               <div class="col-md-6">
                  <div class="discover-title">
                     <h2>Discover New Ideas
                        With Us!
                     </h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                  <div class="dicover-list">
                     <ul>
                        <li>
                           <i class="fa fa-check" aria-hidden="true"></i>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                              do eiusmod tempor.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-check" aria-hidden="true"></i>
                           <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-check" aria-hidden="true"></i>
                           <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco
                              laboris nisi.
                           </p>
                        </li>
                     </ul>
                     <a class="viso-btn discover" href="#">View All Features</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="discover-image">
                     <img src="assets/img/discover-right.png" alt="">
                  </div>
               </div>
            </div> -->
            <div class="row" data-scroll-index="1">
               <div class="col-md-8 offset-md-2 col-md-8">
                  <div class="section-title text-center">
                     <h2>Customer Engangement</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- single counter -->
               <div class="col-md-3 col-sm-6">
                  <div class="counter-project">
                     <h1><?= $fetch_customer['established']; ?></h1>
                     <span>Established</span>
                  </div>
               </div>
               <!-- single counter -->
               <!-- single counter -->
               <div class="col-md-3 col-sm-6">
                  <div class="counter-project">
                     <h1><?= $fetch_customer['happy_client']; ?></h1>
                     <span>happy clients</span>
                  </div>
               </div>
               <!-- single counter -->
               <!-- single counter -->
               <div class="col-md-3 col-sm-6">
                  <div class="counter-project">
                     <h1><?= $fetch_customer['active_client']; ?></h1>
                     <span>active clients</span>
                  </div>
               </div>
               <!-- single counter -->
               <!-- single counter -->
               <div class="col-md-3 col-sm-6">
                  <div class="counter-project">
                     <h1><?= $fetch_customer['success_client']; ?></h1>
                     <span>Success Event</span>
                  </div>
               </div>
               <!-- single counter -->
            </div>
         </div>
      </div>
      <!-- /End Discover Area -->
      <!-- Service Area -->

      <div class="service-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2" data-scroll-index="2">
                  <div class="section-title text-center">
                     <h2>Discover Our Expertise</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="active-service-carousl owl-carousel">
                  <?php
                  $sql_service = "SELECT id_service, gambar_service, judul_service, caption_service FROM services";
                  $query_service = mysqli_query($koneksi, $sql_service);

                  if (mysqli_num_rows($query_service) === 0) {
                     echo "<div class='single-service'>";
                     echo "<h2>No Service Available</h2>";
                     echo "</div>";
                  } else {
                     while ($fetch_service = mysqli_fetch_assoc($query_service)) {
                        $gambar_service = str_replace("../../", "", $fetch_service['gambar_service']);
                        echo "<div class='single-service'>";
                        echo "<img src='$gambar_service' >";
                        echo "<h2>" . $fetch_service['judul_service'] . "</h2>";
                        echo "<p>" . $fetch_service['caption_service'] . "</p>";
                        echo "</div>";
                     }
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
      <!-- /End Service Area -->
      <!-- Portfolio Area-->
      <div class="portfolio-area">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>What WE DO</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="portfolio-menu filter-button-group text-center">
                     <ul>
                        <li class="active" data-filter="*">All Projects</li>
                        <?php
                        $sql_kategori_portofolio = "SELECT kategori_id, kategori_porto FROM kategori_portofolio";
                        $query_kategori_portofolio = mysqli_query($koneksi, $sql_kategori_portofolio);

                        while ($fetch_kategori_portofolio = mysqli_fetch_assoc($query_kategori_portofolio)) {
                           $kategori_id = $fetch_kategori_portofolio['kategori_id'];
                           $kategori_porto = $fetch_kategori_portofolio['kategori_porto'];
                        ?>
                           <li data-filter=".<?= $kategori_porto ?>"><?= $kategori_porto ?></li>
                        <?php
                        }
                        ?>
                     </ul>
                  </div>
               </div>
            </div>

         </div>
         <div class="grid">
            <!-- Single Portfolio -->
            <?php
            $sql_portofolio = "SELECT p.nama_kegiatan, k.kategori_porto, p.lokasi_img
                   FROM portofolio p
                   INNER JOIN kategori_portofolio k ON p.kategori_id = k.kategori_id";
            $query_portofolio = mysqli_query($koneksi, $sql_portofolio);
            ?>

            <div class="portfolio-container">
               <?php
               while ($row = mysqli_fetch_assoc($query_portofolio)) {
                  $nama_kegiatan = $row['nama_kegiatan'];
                  $kategori_porto = $row['kategori_porto'];
                  $lokasi_img = str_replace('../../', '', $row['lokasi_img']);
               ?>
                  <div class="single-portfolio grid-item <?= $kategori_porto ?>" style="max-width: 70%; height: 380px;">
                     <img src="<?= $lokasi_img ?>" alt="">
                     <div class="portfolio-wrapper">
                        <div class="portfolio-content">
                           <h3><?= $nama_kegiatan ?></h3>
                           <p><?= $kategori_porto ?></p>
                        </div>
                     </div>
                  </div>
               <?php
               }
               ?>
            </div>


         </div>
      </div>
      <!-- /End Portfolio Area-->

      <div class="testimonial-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>Showreel Delite</h2>
                  </div>
               </div>
               <div class="testimonial-active owl-carousel">
                  <?php
                  while ($row = mysqli_fetch_assoc($query_showreel_section)) {
                     $judul_showreel = $row['judul_showreel'];
                     $deskripsi_showreel = $row['deskripsi_showreel'];
                     $link_showreel = $row['link_showreel'];
                  ?>
                     <div class="single-testimonial">
                        <div class="testimonail-img">
                           <iframe src="<?= $link_showreel ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="testimonial-content">
                           <h3><?= $judul_showreel ?></h3>
                           <p><?= $deskripsi_showreel ?></p>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>

      <!-- /End Testimonial  Area -->

      <!-- Blog Area -->
      <div class="blog-area section-padding" data-scroll-index="3">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>Berita Terbaru kami</h2>
                  </div>
               </div>
            </div>
            <div class="row">

               <!-- Single Blog -->
               <?php


               $api_key = $fetch_blogger['api_key'];;
               $blog_id = $fetch_blogger['blog_id'];;
               $post_limit = 3; // Batas jumlah postingan yang ditampilkan

               $url = "https://www.googleapis.com/blogger/v3/blogs/{$blog_id}/posts?key={$api_key}";

               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, $url);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $response = curl_exec($ch);
               curl_close($ch);

               $data = json_decode($response, true);

               if (isset($data['items'])) {
                  $counter = 0; // Variabel untuk menghitung jumlah postingan yang sudah ditampilkan

                  foreach ($data['items'] as $post) {
                     $title = $post['title'];
                     $content = $post['content'];
                     $permalink = $post['url'];
                     $category = $post['labels'][0];
                     $likes = $post['replies']['totalItems'];
                     $comments = isset($post['replies']['comments']) ? count($post['replies']['comments']) : 0;
                     $views = isset($post['pageViews']['total']) ? $post['pageViews']['total'] : 0;

                     $image_url = '';
                     if (isset($post['content'])) {
                        $content = $post['content'];
                        $pattern = '/<img[^>]+src="([^">]+)"/';
                        if (preg_match($pattern, $content, $matches)) {
                           $image_url = $matches[1];
                        }
                     }

                     $author = $post['author']['displayName']; // Mendapatkan nama penulis

                     echo '<div class="col-md-4">';
                     echo '   <div class="single-blog m-t">';
                     echo '      <div class="blog-img">';
                     echo "         <img src='{$image_url}' alt=''>";
                     echo '      </div>';
                     echo '      <div class="blog-content">';
                     echo "         <p>Posted By <span>{$author}</span></p>"; // Menggunakan data nama penulis
                     echo "         <a href='{$permalink}'>";
                     echo "            <h2>{$title}</h2>";
                     echo '         </a>';
                     echo '         <div class="blog-meta">';
                     echo "            <span><i class='fa fa-folder-open-o' aria-hidden='true'></i>{$category}</span>";
                     echo "            <span><i class='fa fa-thumbs-o-up' aria-hidden='true'></i>{$likes} likes</span>";
                     echo "            <span><i class='fa fa-comment-o' aria-hidden='true'></i>{$comments} comments</span>";
                     echo '         </div>';
                     echo '      </div>';
                     echo '   </div>';
                     echo '</div>';

                     $counter++; // Mengupdate jumlah postingan yang sudah ditampilkan

                     if ($counter >= $post_limit) {
                        break; // Menghentikan loop setelah mencapai batas
                     }
                  }
               } else {
                  echo "Tidak ada postingan yang ditemukan.";
               }
               ?>

            </div>
         </div>
      </div>

      <!-- DIHILANGKAN -->
      <!-- Call To Action Area-->
      <!-- <div class="cta-area">
         <div class="container">
            <div class="row">
               <div class="col-md-9 col-sm-12">
                  <div class="cta-text">
                     <h2>Want to see our more creative work? </h2>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="cta-btn">
                     <a class="viso-btn cta" href="#">contat us</a>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- /End Call To Action Area-->


      <!-- Team Area -->
      <div class="team-area">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>Our Team Member</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- single team -->
               <?php
               while ($team_area = mysqli_fetch_assoc($query_team_area)) {
                  $nama_team = $team_area['nama_team'];
                  $jabatan_team = $team_area['jabatan_team'];
                  $lokasi_img = str_replace("../../", "", $team_area['lokasi_img']);
               ?>

                  <div class="col-md-4">
                     <div class="single-team" style="max-height: 380px;">
                        <img src="<?php echo $lokasi_img; ?>" style="max-height: 200px;" alt="">
                        <h2><?php echo $nama_team; ?></h2>
                        <p><?php echo $jabatan_team; ?></p>
                     </div>
                  </div>

               <?php
               }
               ?>


            </div>
         </div>
      </div>
      <!-- /End Team Area -->
      <!-- About Agency Area -->
      <!-- <div class="about-agency section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="agency-details">
                     <h2>We help clients to create Digital amazing experience.</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                     <a class="viso-btn discover" href="#">Case study</a>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- /End About Agency Area -->
      <!-- Pricing  Area -->
      <!-- <div class="pricing-area section-padding" data-scroll-index="3">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-sm-12">
                  <div class="section-title effect text-left">
                     <h2>our pricing plan</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur cing elit, sed do eiusmod tempor incididuntut.</p>
                  </div>
               </div>
               <div class="col-md-4 offset-md-3 col-sm-12">
                  <div class="price-swetch float-right m-t">
                     <ul class="nav" id="myTab" role="tablist">
                        <li>
                           <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">yearly</a>
                        </li>
                        <li>
                           <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">monthly</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img1.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>Basic Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate basic">$10.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img2.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>standard Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate advance">$15.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img3.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>premium Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate pro">$20.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="row">

                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img1.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>Basic Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate basic">$100.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img2.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>standard Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate advance">$150.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="pricing-table m-t">
                              <div class="price-img">
                                 <img src="assets/img/price-img3.png" alt="">
                              </div>
                              <div class="price-content">
                                 <h2>premium Plan</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mojak eiusmod tempor incididun.</p>
                                 <span class="rate pro">$200.00</span>
                                 <a class="viso-btn price" href="#">purchase now</a>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- /End Pricing  Area -->
      <!-- Testimonmail Area -->
      <!-- FAQ AREA -->
      <div class="faq-area section-padding" data-scroll-index="4">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>Frequently Asked Questions</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <!-- Single FAQ -->
                  <?php
                  $sql_faq_section = "SELECT faq_id, pertanyaan_faq, jawaban_faq FROM faq_section";
                  $query_faq_section = mysqli_query($koneksi, $sql_faq_section);

                  while ($fetch_faq_section = mysqli_fetch_assoc($query_faq_section)) {
                     $faq_id = $fetch_faq_section['faq_id'];
                     $pertanyaan_faq = $fetch_faq_section['pertanyaan_faq'];
                     $jawaban_faq = $fetch_faq_section['jawaban_faq'];
                  ?>
                     <div class="faq-item">
                        <div class="accordion" id="faqAccordion<?= $faq_id ?>">
                           <div class="card">
                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $faq_id ?>" aria-expanded="true" aria-controls="collapse<?= $faq_id ?>">
                                 <div class="card-header" id="heading<?= $faq_id ?>">
                                    <h3 class="faq-question text-center mb-0">
                                       <?= $pertanyaan_faq ?>
                                    </h3>
                                 </div>
                              </button>

                              <div id="collapse<?= $faq_id ?>" class="collapse" aria-labelledby="heading<?= $faq_id ?>" data-parent="#faqAccordion<?= $faq_id ?>">
                                 <div class="card-body faq-answer">
                                    <p><?= $jawaban_faq ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
                  <!-- /End Single FAQ -->
               </div>
            </div>
         </div>
      </div>

      <!-- /End FAQ AREA -->

      <!-- /End Blog Area -->
      <!-- Contact Area -->
      <!-- KONTAK VIA EMAIL -->
      <?php
      //    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //       $name = $_POST['name'];
      //       $email = $_POST['email'];
      //       $phone = $_POST['phone'];
      //       $subject = $_POST['subject'];
      //       $message = $_POST['message'];

      //       $to = $email_kontak;
      //       $headers = "From: $email\r\n";
      //       $headers .= "Reply-To: $email\r\n";
      //       $headers .= "MIME-Version: 1.0\r\n";
      //       $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      //       $message = "
      //    <html>
      //    <head>
      //   <title>New Message</title>
      //    </head>
      //    <body>
      //   <h3>New Message</h3>
      //   <p><strong>Name:</strong> $name</p>
      //   <p><strong>Email:</strong> $email</p>
      //   <p><strong>Phone:</strong> $phone</p>
      //   <p><strong>Subject:</strong> $subject</p>
      //   <p><strong>Message:</strong> $message</p>
      //    </body>
      //    </html>";

      //       if (mail($to, $subject, $message, $headers)) {
      //          echo '<script>alert("Email sent successfully.");</script>';
      //       } else {
      //          echo '<script>alert("Failed to send email.");</script>';
      //       }
      //    }
      ?>
      <!-- <div class="contact-area section-padding" data-scroll-index="5">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <div class="section-title text-center">
                           <h2>Get In touch</h2>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="contact-form m-t">
                           <form method="post">
                              <div class="row">
                                 <div class="col-md-6">
                                    <p>
                                       <input type="text" name="name" placeholder="Enter Your Name">
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <p>
                                       <input type="email" name="email" placeholder="Enter Your Email">
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <p>
                                       <input type="tel" name="phone" placeholder="Enter Your Phone">
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <p>
                                       <input type="text" name="subject" placeholder="Your Subject">
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <p>
                                       <textarea name="message" cols="30" rows="10" placeholder="Write Your Message"></textarea>
                                    </p>
                                 </div>
                              </div>
                              <div class="row text-center">
                                 <div class="col-md-12">
                                    <p>
                                       <input type="submit" value="Send Message">
                                    </p>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->

      <!-- KONTAK VIA WA -->
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $name = $_POST['name'];
         $phone = $_POST['phone'];
         $message = $_POST['message'];

         $whatsappUrl = 'https://api.whatsapp.com/send';
         $whatsappNumber = $nomor_kontak;
         $text = "Halo, saya $name. $message";

         $encodedText = urlencode($text);
         $fullUrl = "$whatsappUrl?phone=$whatsappNumber&text=$encodedText";

         echo "<script>window.location.href = '$fullUrl';</script>";
      }
      ?>

      <div class="contact-area section-padding" data-scroll-index="5">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="section-title text-center">
                     <h2>Get In touch</h2>
                     <p>Any Question ?</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="contact-form m-t">
                     <form method="post">
                        <div class="row">
                           <div class="col-md-6">
                              <p>
                                 <input type="text" name="name" placeholder="Enter Your Name" required>
                              </p>
                           </div>
                           <div class="col-md-6">
                              <p>
                                 <input type="tel" name="phone" placeholder="Enter Your Phone" required>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <p>
                                 <textarea name="message" cols="30" rows="10" placeholder="Write Your Message"></textarea>
                              </p>
                           </div>
                        </div>
                        <div class="row text-center">
                           <div class="col-md-12">
                              <p>
                                 <input type="submit" value="Send Message">
                              </p>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- /End Contact Area -->
      <!-- Start Goolge map -->
      <div class="map-area">
         <div class="section-title text-center">
            <h2>Our Office</h2>
         </div>
         <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="450px" id="gmap_canvas" src="<?= $fetch_maps['link_maps'] ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br>
               <style>
                  .mapouter {
                     position: relative;
                     text-align: right;
                     height: 450px;
                     width: 100%;
                  }
               </style><a href="https://embedgooglemap.2yu.co">html embed google map</a>
               <style>
                  .gmap_canvas {
                     overflow: hidden;
                     background: none !important;
                     height: 450px;
                     width: 100%;
                  }
               </style>
            </div>
         </div>
      </div>
      <!-- /End Google map -->
      <!-- Footer Area -->
      <footer>
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-4">
                     <div class="about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p><?=$about_us['about_us']?></p>
                        <ul>
                           <li>
                              <i class="fa fa-envelope-o"></i>
                              <p><?= $email_kontak ?></p>
                           </li>
                           <li>
                              <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                              <p><?= $nomor_kontak ?></p>
                           </li>
                        </ul>
                        <div class="footer-social">
                           <ul>
                              <li><a href="<?= $fetch_area_social['link_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="<?= $fetch_area_social['link_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                              <li><a href="<?= $fetch_area_social['link_youtube'] ?>"><i class="fa fa-youtube"></i></a></li>
                              <li><a href="<?= $fetch_area_social['link_tiktok'] ?>"><i class="fab fa-tiktok"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                          <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                       </svg></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-md-2">
                     <div class="footer-logo">
                        <a href="#">
                           <img src=<?= $logo_utama ?> alt="logo utama">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="copyright-text">
                        <p>Copyright HIMBUANA 2023. All Rights Reserved</p>
                     </div>
                  </div>
               </div>
               <!-- Scroll To Top -->
               <a href="#" class="scrollup"><i class="fa fa-angle-double-up"></i></a>
            </div>
         </div>
      </footer>
      <!-- /End Footer Area -->
   </div><!-- /End Main Site -->
   <!-- Js File-->
   <script src="assets/js/jquery.v3.4.1.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script> -->
   <script src="assets/js/scrollIt.min.js"></script>
   <script src="assets/js/jquery.slicknav.min.js"></script>
   <!-- <script src="assets/js/map.js"></script> -->
   <script src="assets/js/owl.carousel.min.js"></script>
   <script src="assets/js/isotope.pkgd.min.js"></script>
   <script src="assets/js/plugins.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>
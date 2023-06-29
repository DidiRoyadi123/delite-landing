<?php
include_once "login/sambungan.php";
$sql_title_favicon = "SELECT lokasi_favicon, title FROM title_favicon";
$query_title_favicon = mysqli_query($koneksi, $sql_title_favicon);
$fetch_title_favicon = mysqli_fetch_assoc($query_title_favicon);
$favicon = str_replace("../../", "", $fetch_title_favicon['lokasi_favicon']);
?>
<!doctype html>
<html lang="en">

<head>
   <!-- Meta Tags -->
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="author" content="themeholder">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?= $fetch_title_favicon['title'] ?> </title>
   <!-- Favicon Icon -->
   <link rel="shortcut icon" type="image/png" href="<?php echo $fetch_title_favicon['lokasi_favicon']; ?>">
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
      @media (min-width: 768px) {
         .post-thumb img {
            width: 100%;
            height: auto;
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
                     <a href="index.html">
                        <img src="assets/img/logo.png" alt="">
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
                           <li><a href="#" data-scroll-nav="3">Pricing</a></li>
                           <li class="dropdown">
                              <a href="#" data-scroll-nav="4">Blog</a>
                              <ul>
                                 <li><a href="blog.php">Blog Page</a></li>
                              </ul>
                           </li>
                           <li><a href="#" data-scroll-nav="5">Contact</a></li>
                        </ul>
                     </nav>
                  </div>>
                  <div id="mobile-menu"></div>
               </div>
               <div class="col-md-2">
                  <div class="call-button">
                     <a href="#"><i class="fa fa-phone"></i> +880 1234 567</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Area End!-->
      <!-- Breadcrumb -->
      <div class="breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2>Latest News</h2>
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li class="active"><a href="#">Blog</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- /End Breadcrumb -->
      <!-- Main Blog -->
      <div class="blog-page section-padding">
         <div class="container">
            <div class="row">
               <!-- Blog Posts Area -->
               <div class="col-lg-8">
                  <!-- Single Blog Post -->
                  <?php

                  $api_key = 'AIzaSyDsxExRLrV3b5OAQVjgVUXkh6CpubdRypc';
                  $blog_id = '2102108696088625368';

                  // URL Endpoint untuk mengambil postingan blog menggunakan API Blogger
                  $url = "https://www.googleapis.com/blogger/v3/blogs/{$blog_id}/posts?key={$api_key}";

                  // Mengambil data dari API menggunakan cURL
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $url);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  curl_close($ch);

                  // Parsing dan menampilkan data postingan
                  $data = json_decode($response, true);

                  if (isset($data['items'])) {
                     foreach ($data['items'] as $post) {
                        $title = $post['title'];
                        $content = $post['content'];
                        $permalink = $post['url'];
                        $category = $post['labels'][0];
                        $likes = $post['replies']['totalItems'];
                        $comments = isset($post['replies']['comments']) ? count($post['replies']['comments']) : 0;
                        $views = isset($post['pageViews']['total']) ? $post['pageViews']['total'] : 0;

                        // Mendapatkan URL gambar dari postingan blog
                        $image_url = '';
                        if (isset($post['content'])) {
                           $content = $post['content'];
                           $pattern = '/<img[^>]+src="([^">]+)"/';
                           if (preg_match($pattern, $content, $matches)) {
                              $image_url = $matches[1];
                           }
                        }

                        echo '<div class="viso-blog-post">';
                        echo '   <div class="post-thumb">';
                        echo "      <img src='{$image_url}' alt='' class='img-responsive'>";
                        echo '   </div>';

                        echo '   <div class="blog-posts-meta">';
                        echo '      <ul>';
                        echo "         <li><i class='fa fa-folder-open-o'></i>{$category}</li>";
                        echo "         <li><i class='fa fa-thumbs-o-up'></i>{$likes} likes</li>";
                        echo "         <li><i class='fa fa-comment-o'></i>{$comments} Comments</li>";
                        echo "         <li><i class='fa fa-eye'></i>{$views} Views</li>";
                        echo '      </ul>';
                        echo '   </div>';
                        echo "   <h3 class='blog-title'><a href='{$permalink}'>{$title}</a></h3>";
                        echo "   <a href='{$permalink}' class='viso-btn read-more'>Read more</a>";
                        echo '</div>';
                     }
                  } else {
                     echo "Tidak ada postingan yang ditemukan.";
                  }
                  ?>

                  <!-- Single Blog Post End -->
                  <div class="row text-left">
                     <div class="col-lg-12">
                        <nav class="blog-Pagination">
                           <a class="prev page-numbers" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                           <a class="active" href="#">01</a>
                           <a href="#">02</a>
                           <a href="#">03</a>
                           <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </nav>
                     </div>
                  </div>
               </div>
               <!-- Blog Posts Area End-->
               <!-- Sidebar area -->
               <div class="col-lg-4">
                  <div class="container">
                     <!-- Author Widget-->
                     <!-- <div class="row">
                        <div class="col-lg-12">
                           <div class="widget author-widget">
                              <div class="author-img">
                                 <img src="assets/img/author.png" alt="">
                              </div>
                              <h2>Laisha Bednar</h2>
                              <p>Lorem ipsum dolor sit amet consectetur isicing elit sed do ei usmod tempor dunt.enim minim veniam, aliquip ex commodo.</p>
                              <div class="signature">
                                 <img src="assets/img/signatue.png" alt="">
                              </div>
                              <ul class="author-social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                 <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div> -->
                     <!-- /End Author Widget -->
                     <!-- Latest News Widget -->
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="widget latest-news-widget">
                              <h4>Latest News</h4>
                              <?php

                              $api_key = 'AIzaSyDsxExRLrV3b5OAQVjgVUXkh6CpubdRypc';
                              $blog_id = '2102108696088625368';


                              // URL Endpoint untuk mengambil postingan blog menggunakan API Blogger
                              $url = "https://www.googleapis.com/blogger/v3/blogs/{$blog_id}/posts?key={$api_key}&fetchBodies=true&orderBy=published&maxResults=3";

                              // Mengambil data dari API menggunakan cURL
                              $ch = curl_init();
                              curl_setopt($ch, CURLOPT_URL, $url);
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              $response = curl_exec($ch);
                              curl_close($ch);

                              // Parsing dan menampilkan data postingan
                              $data = json_decode($response, true);

                              if (isset($data['items'])) {
                                 foreach ($data['items'] as $post) {
                                    $title = $post['title'];
                                    $permalink = $post['url'];
                                    $publishedDate = date('d M Y', strtotime($post['published']));

                                    $image_url = '';
                                    if (isset($post['content'])) {
                                       $content = $post['content'];
                                       $pattern = '/<img[^>]+src="([^">]+)"/';
                                       if (preg_match($pattern, $content, $matches)) {
                                          $image_url = $matches[1];
                                       }
                                    }

                                    echo '<div class="row ml-0 mr-0 bdr">';
                                    echo '   <div class="col-md-4 col-sm-12 col-xs-12 float-left ml-0 mr-0 px-0" style="height: 100%">';
                                    echo "      <a href='{$permalink}'><img src='{$image_url}' style='width: 60px; height: 67px;' alt=''></a>";
                                    echo '   </div>';
                                    echo '   <div class="col-md-8 col-sm-12 col-xs-12 text-left float-right px-0">';
                                    echo '      <div class="latest-news-title">';
                                    echo "         <p class=''><a href='{$permalink}'>{$title}</a></p>";
                                    echo "         <p>{$publishedDate}</p>";
                                    echo '      </div>';
                                    echo '   </div>';
                                    echo '</div>';
                                 }
                              } else {
                                 echo "Tidak ada postingan yang ditemukan.";
                              }

                              ?>
                              <!-- /End Latest News Widget -->
                              <!-- Category Widget -->
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="widget category-widget">
                                       <h4>Category</h4>
                                       <?php
                                       $api_key = 'AIzaSyDsxExRLrV3b5OAQVjgVUXkh6CpubdRypc';
                                       $blog_id = '2102108696088625368';

                                       // URL Endpoint untuk mengambil daftar kategori menggunakan API Blogger
                                       $url = "https://www.googleapis.com/blogger/v3/blogs/{$blog_id}/labels?key={$api_key}";

                                       // Mengambil data dari API menggunakan cURL
                                       $ch = curl_init();
                                       curl_setopt($ch, CURLOPT_URL, $url);
                                       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                       $response = curl_exec($ch);
                                       curl_close($ch);

                                       // Parsing dan menampilkan daftar kategori
                                       $data = json_decode($response, true);


                                       if (isset($data['items'])) {
                                          foreach ($data['items'] as $post) {
                                             $category = $post['labels'][0];
                                             echo "<li><a href='#'>{$category}</a></li>";
                                          }
                                          echo '</ul>';
                                       } else {
                                          echo "Tidak ada kategori yang ditemukan.";
                                       }

                                       ?>

                                    </div>
                                 </div>
                              </div>
                              <!-- /End Category Widget -->
                              <!-- Archive Widget -->
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="widget archive-post-widget">
                                       <h4>Archive Posts</h4>
                                       <ul class="category">
                                          <li><a href="#">march 2015<span>(05)</span></a></li>
                                          <li><a href="#">april 2015<span>(03)</span></a></li>
                                          <li><a href="#">august 2016<span>(17)</span></a></li>
                                          <li><a href="#">july 2017<span>(14)</span></a></li>
                                          <li><a href="#">fabruary 2018<span>(9)</span></a></li>
                                          <li><a href="#">january 2019<span>(11)</span></a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- /End Archive Widget -->
                              <!-- Tags Widget -->
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="widget popular-tag-widget">
                                       <h4>Popular tags</h4>
                                       <ul class="tags">
                                          <li><a href="#">Finace</a></li>
                                          <li><a href="#">tech</a></li>
                                          <li><a href="#">life</a></li>
                                          <li><a href="#">tech</a></li>
                                          <li><a href="#">life</a></li>
                                          <li><a href="#">finace</a></li>
                                          <li><a href="#">tech</a></li>
                                          <li><a href="#">life</a></li>
                                          <li><a href="#">web</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- /End Tags Widget -->
                           </div>
                        </div>
                        <!-- Sidebar area End -->
                     </div>
                  </div>
               </div>
               <!-- /End Main Blog -->
               <!-- Footer Area -->
               <footer>
                  <div class="footer-top">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="about-widget">
                                 <h2 class="widget-title">About us</h2>
                                 <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis trud exercitation ullamco laboris.</p>
                                 <ul>
                                    <li>
                                       <i class="fa fa-map-o"></i>
                                       <p>2750 Quadra Street Victoria, USA</p>
                                    </li>
                                    <li>
                                       <i class="fa fa-envelope-o"></i>
                                       <p>info@example.com</p>
                                    </li>
                                    <li>
                                       <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                                       <p>+324-9442-515</p>
                                    </li>
                                 </ul>
                                 <div class="footer-social">
                                    <ul>
                                       <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                       <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="widget-link">
                                 <h2 class="widget-title">Essential Links</h2>
                                 <ul class="widget-menu">
                                    <li><a href="">Service</a></li>
                                    <li><a href="">Strategic Planning</a></li>
                                    <li><a href="">Audit & Assurance</a></li>
                                    <li><a href="">Business Services</a></li>
                                    <li><a href="">Sales & Trading</a></li>
                                    <li><a href="">Pricing Plan</a></li>
                                    <li><a href="">Our Features</a></li>
                                 </ul>
                                 <ul class="widget-menu two">
                                    <li><a href="">Find a Job?</a></li>
                                    <li><a href="">Looking Consultant?</a></li>
                                    <li><a href="">Download Apps?</a></li>
                                    <li><a href="">Create An Account?</a></li>
                                    <li><a href="">Much More?</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="widget-feed">
                                 <h2 class="widget-title">new feeds</h2>
                                 <ul>
                                    <li><img src="assets/img/feed1.png" alt=""></li>
                                    <li><img src="assets/img/feed2.png" alt=""></li>
                                    <li><img src="assets/img/feed3.png" alt=""></li>
                                    <li><img src="assets/img/feed4.png" alt=""></li>
                                    <li><img src="assets/img/feed5.png" alt=""></li>
                                    <li><img src="assets/img/feed6.png" alt=""></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="footer-bottom">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="footer-logo">
                                 <a href="#">
                                    <img src="assets/img/footer-logo.png" alt="">
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="copyright-text">
                                 <p>Copyright 2019 Viso. All Rights Reserved</p>
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
            <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script>
            <script src="assets/js/scrollIt.min.js"></script>
            <script src="assets/js/jquery.slicknav.min.js"></script>
            <script src="assets/js/map.js"></script>
            <script src="assets/js/owl.carousel.min.js"></script>
            <script src="assets/js/isotope.pkgd.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/main.js"></script>
</body>

</html>
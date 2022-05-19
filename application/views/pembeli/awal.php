<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Fruitables</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/fontawesome/css/all.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <?php
            $session = $this->session->userdata('username');
            $this->db->from('keranjang');
            $this->db->where('user', $session);
            $data = $this->db->get();
            ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Hubungi kami di :+ <a href="#"> 62 8975 995 652</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <?php
                    $session = $this->session->userdata('username');
                    $total = 0;
                    if (!$session) {
                    ?>
                        <div class="login-box">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffff">
                                <i class="fas fa-user-friends" style="color:#ffff"></i>Login</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('login'); ?>" class="badge badge-warning">Login</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('register'); ?>">daftar</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php
                        $this->db->from('keranjang');
                        $this->db->where('user', $session);
                        $data = $this->db->get();
                        ?>
                        <div class="login-box">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffff">
                                <i class="fas fa-user-friends" style="color:#ffff"></i> <?php echo $session; ?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('profil'); ?>">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Sayuran segar setiap hari
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Hidup sehat
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Di panen dari petani lokal
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('asset/img/logo1.png') ?>" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(''); ?>">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('produk'); ?>">Belanja</a></li>
                        <?php ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <?php
                    $this->db->from('keranjang');
                    $this->db->where('user', $session);
                    $data = $this->db->get();
                    ?>
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?php echo $data->num_rows(); ?></span>
                                <p>Keranjang</p>
                            </a>
                        </li>
                    </ul>
                    <?php ?>
                    <?php
                    $this->db->from('transaksi');
                    $this->db->where('user', $session);
                    $data = $this->db->get();
                    ?>
                    <ul>
                        <li class="nav-item">
                            <a href="<?php echo base_url('pembeli/pesanan'); ?>">
                                <span class="badge"><?php echo $data->num_rows(); ?></span>
                                <p>pesanan</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                        </li>
                        <li class="total">
                            <a href="<?php echo base_url('keranjang'); ?>" class="btn btn-default hvr-hover btn-cart">Lihat detail</a>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->

    <div class="top-search">
        <?php echo form_open('pembeli/search', array('class' => 'form-inline my-2 my-lg-0')); ?>
        <div class="container">
            <div class="input-group">
                <form action="<?= base_url('pembeli/search'); ?>" method="post">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="<?php echo base_url('asset/pembeli/sip/images/banner-01.jpg') ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat datang di <br> Fruitables</strong></h1>
                            <p class="m-b-40">Tempat dimana kamu bisa mendapatkan sayuran segar <br> yang di petik langsung dari kebun nya.</p>
                            <p><a class="btn hvr-hover" href="<?php echo base_url('produk'); ?>">Belanja sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="<?php echo base_url('asset/pembeli/sip/images/banner-04.jpg') ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat datang di <br> Fruitables</strong></h1>
                            <p class="m-b-40">Tempat dimana kamu bisa mendapatkan sayuran segar <br> yang di petik langsung dari kebun nya.</p>
                            <p><a class="btn hvr-hover" href="<?php echo base_url('produk'); ?>">Belanja sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="<?php echo base_url('asset/pembeli/sip/images/banner-05.jpg') ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat datang di <br> Fruitables</strong></h1>
                            <p class="m-b-40">Tempat dimana kamu bisa mendapatkan sayuran segar <br> yang di petik langsung dari kebun nya.</p>
                            <p><a class="btn hvr-hover" href="<?php echo base_url('produk'); ?>">Belanja sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Fruits & Vegetables</h1>
                        <p>Sayur dan buah-buahan organik terbaik</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="" data-filter="*">Terbaru</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">

                <?php
                $this->db->from('produk');
                $this->db->order_by('id', 'DESC');
                $this->db->limit(8);
                $produk = $this->db->get();
                $data_produk = $produk->result_array();
                foreach ($data_produk as $row) {
                ?>
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Sale</p>
                                </div>
                                <img src="<?php echo base_url('asset/img/produk/') . $row['nama_file']; ?>" class="img-fluid" alt="<?php echo $row['slug_nama_produk']; ?>">
                                <div class="mask-icon">
                                    <a class="cart" href="<?php echo base_url('post/') . $row['slug_nama_produk']; ?>">Beli</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?php echo $row['nama_produk']; ?></h4>
                                <h5> Rp. <?php echo number_format($row['harga']); ?> /<?php echo $row['satuan']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a>
        </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/jquery.superslides.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/inewsticker.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/bootsnav.js."></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/images-loded.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/baguetteBox.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/form-validator.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sipjs/contact-form-script.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/sip/js/custom.js"></script>

    </form>
</body>

</html>
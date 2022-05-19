<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
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
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <?php
                    $session = $this->session->userdata('username');
                    $this->db->from('keranjang');
                    $this->db->where('user', $session);
                    $data = $this->db->get();
                    ?>
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="<?php echo base_url('keranjang'); ?>">
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
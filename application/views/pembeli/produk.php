<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fruitables</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/style.css">

    <script>
        $(document).ready(function() {
            var count = 0;
            var limit = 8;
            var test = "Pembeli/load";
            $("button").click(function() {
                limit = limit + 8;
                $("#page").load(test, {
                    tambah: limit
                });

                if (limit == test.length) {
                    count = 0;
                    $("#btn").hiide();
                    $("#akhir").append("anda telah mencapai data akhir");
                    return;
                }

            });

        });
    </script>

</head>

<body>

    <section class="section section-header">
        <?php $this->load->view('pembeli/library/kepala'); ?>
    </section>

    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Fruits & Vegetables</h1>
                        <p>Sayur dan buah-buahan organiik terbaik</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="" data-filter="*">Semua</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">

                <?php
                foreach ($data as $row) {
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
                                <h5> Rp. <?php echo number_format($row['harga'], 2, ",", "."); ?> /<?php echo $row['satuan']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="text-align:center;">
            <div class="col-sm-12">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

    <br>



    <div class="footer">
        <?php $this->load->view('pembeli/library/kaki'); ?>
    </div>

    < src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
    < src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></>
    < src="<?php echo base_url(); ?>asset/pembeli/js/bootstrap.min.js"></>
</body>

</html>
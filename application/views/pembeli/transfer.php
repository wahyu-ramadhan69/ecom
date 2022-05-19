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
</head>

<body>

    <section class="section section-header">
        <?php $this->load->view('pembeli/library/kepala'); ?>
    </section>

    <section class="section section-profil">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Halo, <?php echo $this->session->userdata('username'); ?>!</h5>
                            <p>
                                Terima kasih telah melakukan transaksi. <br>
                                Tagihan Anda sebesar <b>Rp. <?php echo number_format($this->session->userdata('tagihan'), 2, '.', '.'); ?></b> <br>

                                <?php
                                if ($this->session->userdata('metode') == 'BNI') :
                                    echo ' <hr>';
                                    echo '<h3>Silahkan transfer ke No Rekening dibawah.</p><h3>';
                                    echo 'No Rekening';
                                    echo '<table width="500">';
                                    echo '<tr>';
                                    echo '<td>BNI</td>';
                                    echo '<td>:</td>';
                                    echo '<td>xxxx xxxx xxxx xxxx</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Ongkos kirim</td>';
                                    echo '<td>: </td>';
                                    echo '<td>Gratis.</td></p>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Metode pembayaran</td>';
                                    echo '<td> : </td>';
                                    echo '<td>Bank BNI.</td></p>';
                                    echo ' </tr>';
                                    echo '</table>';
                                    echo '<hr>';
                                    echo ' <p>';
                                    echo ' Silahkan melakukan konfirmasi di 0897-5995-652 (WA) dengan format <br>';
                                    echo ' <b>#NAMA_PEMBELI#TAGIHAN</b>';
                                    echo ' </p>';
                                endif;

                                if ($this->session->userdata('metode') == 'BCA') :
                                    echo ' <hr>';
                                    echo '<h3>Silahkan transfer ke No Rekening dibawah.</p><h3>';
                                    echo 'No Rekening';
                                    echo '<table width="500">';
                                    echo '<tr>';
                                    echo '<td>BCA</td>';
                                    echo '<td>:</td>';
                                    echo '<td>xxxx xxxx xxxx xxxx</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Ongkos kirim</td>';
                                    echo '<td>: </td>';
                                    echo '<td>Gratis.</td></p>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Metode pembayaran</td>';
                                    echo '<td> : </td>';
                                    echo '<td>Bank BCA.</td></p>';
                                    echo ' </tr>';
                                    echo '</table>';
                                    echo '<hr>';
                                    echo ' <p>';
                                    echo ' Silahkan melakukan konfirmasi di 0897-5995-652 (WA) dengan format <br>';
                                    echo ' <b>#NAMA_PEMBELI#TAGIHAN</b>';
                                    echo ' </p>';
                                endif;

                                if ($this->session->userdata('metode') == 'BRI') :
                                    echo ' <hr>';
                                    echo '<h3>Silahkan transfer ke No Rekening dibawah.</p><h3>';
                                    echo 'No Rekening';
                                    echo '<table width="500">';
                                    echo '<tr>';
                                    echo '<td>BRI</td>';
                                    echo '<td>:</td>';
                                    echo '<td>xxxx xxxx xxxx xxxx</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Ongkos kirim</td>';
                                    echo '<td>: </td>';
                                    echo '<td>Gratis.</td></p>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Metode pembayaran</td>';
                                    echo '<td> : </td>';
                                    echo '<td>Bank BRI.</td></p>';
                                    echo ' </tr>';
                                    echo '</table>';
                                    echo '<hr>';
                                    echo ' <p>';
                                    echo ' Silahkan melakukan konfirmasi di 0897-5995-652 (WA) dengan format <br>';
                                    echo ' <b>#NAMA_PEMBELI#TAGIHAN</b>';
                                    echo ' </p>';
                                endif;

                                if ($this->session->userdata('metode') == 'COD') :
                                    echo ' <hr>';
                                    echo '<table width="500">';
                                    echo '<tr>';
                                    echo '<td>Ongkos kirim</td>';
                                    echo '<td>: </td>';
                                    echo '<td>Gratis.</td></p>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Metode pembayaran</td>';
                                    echo '<td> : </td>';
                                    echo '<td>Bayar di  tempat.</td></p>';
                                    echo ' </tr>';
                                    echo '</table>';
                                    echo '<hr>';
                                    echo ' <p>';
                                    echo ' Silahkan tunggu pesananmu sampai  lalu bayar melalui kurir <br>';
                                    echo ' </p>';
                                endif;

                                ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="footer">
        <?php $this->load->view('pembeli/library/kaki'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/js/bootstrap.min.js"></script>
</body>

</html>
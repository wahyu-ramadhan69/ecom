<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="">
    <title>Cetak Laporan Penjualan Harian</title>
    <style type="text/css">
        table {
            font-size: 17px;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        table th {
            border: 1px solid #000;
            padding: 7px;
            font-weight: bold;
            text-align: center;
        }

        table td {
            border: 1px solid #000;
            padding: 7px;
            vertical-align: top;
        }
    </style>
</head>

<body onload="window.print();setTimeout(window.close, 0);">
    <img class="" style="float: left; width: 120px; height: 120px; margin-right: -100px;" src="<?= base_url('asset/img/logo1.png'); ?>">
    <h3 style="text-align:center" color="blue">LAPORAN DATA PENJUALAN<br> Fruitables shop<br>
        <FONT SIZE="3"><I>Jl.WR. SUPRATMAN BENGKULU 38371 <br> Telp/Fax: +62 8975 9956 52</FONT>
    </h3>

    </h3>

    <hr>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama produk</th>
                <th>Quantity</th>
                <th>Tanggal pembelian</th>
                <th>Nama pembeli</th>
                <th>Total harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $no = 1;
                foreach ($data as $laporan) {
                ?>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $laporan['nama_produk']; ?></td>
                    <td><?php echo $laporan['qty']; ?></td>
                    <td><?php echo $laporan['tanggal']; ?></td>
                    <td><?php echo $laporan['nama_pembeli']; ?></td>
                    <td align="right">Rp <?= number_format($laporan['total_harga'], 0, ",", ",") ?></td>

            </tr>
        <?php } ?>
        <tr>
            <td>Total</td>
            <td colspan="4"></td>
            <td align="right">Rp <?= number_format($total_harga, 0, ",", ",") ?></td>
        </tr>
        </tbody>

    </table>
    <h3 style="text-align:right">
        <p>Bengkulu, <?php
                        $tgl = date('d-m-Y');
                        echo $tgl; ?></p>


</body>

</html>
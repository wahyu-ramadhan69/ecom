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

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/Admin.min.css">
</head>

<body>

  <section class="section section-header">
    <?php $this->load->view('pembeli/library/kepala'); ?>
  </section>

  <section class="section section-pembayaran">
    <div class="container">
      <h4 class="my-3">Form Pembayaran</h4>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <?php echo form_open('pembeli/prosespembayaran'); ?>
              <?php
              $session = $this->session->userdata('username');
              $list1 = $this->db->get_where('keranjang', array('user' => $session));
              $data_list1 = $list1->result_array();
              foreach ($data_list1 as $row1) {
              ?>
                <input type="hidden" name="nama_produk[]" value="<?php echo $row1['nama_produk']; ?>">
                <input type="hidden" name="qty[]" value="<?php echo $row1['qty']; ?>">
                <input type="hidden" name="total_harga[]" value="<?php echo $row1['total_harga']; ?>">
                <input type="hidden" name="user[]" value="<?php echo $row1['user']; ?>">
                <input type="hidden" name="foto" value="<?php echo $row1['nama_file']; ?>" required>
              <?php } ?>

              <?php
              $session = $this->session->userdata('username');
              $list3 = $this->db->get_where('customer', array('nama' => $session));
              $data_list3 = $list3->result_array();
              foreach ($data_list3 as $row1) {
              ?>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row1['nama']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Detail Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3"><?php echo $row1['alamat']; ?></textarea>
                  <?php echo form_error('alamat', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $row1['email']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Kode Pos</label>
                  <input type="text" class="form-control" name="kodepos" placeholder="Masukkan Kode Pos" required>
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <textarea class="form-control" name="catatan" rows="3"></textarea>
                </div>

                <h3 class="billing-heading mb-4">Metode Pembayaran</h3>
                <div class="form-group">
                  <div class="col-lg-6">
                    <div class="radio">
                      <table cellpadding="100" padding="100">
                        <tr>
                          <th><input name="metode_pembayaran" type="checkbox" value="BNI"><img src="<?php echo base_url('asset/pembeli/img/bni.png') ?>" width="60px" height="20px"></th>
                          <th><input name="metode_pembayaran" type="checkbox" value="BCA"><img src="<?php echo base_url('asset/pembeli/img/logo-bca.png') ?>" width="60px" height="20px"></th>
                          <th><input name="metode_pembayaran" type="checkbox" value="BRI"><img src="<?php echo base_url('asset/pembeli/img/bri.png') ?>" width="60px" height="25px"></th>
                          <th><input name="metode_pembayaran" type="checkbox" value="COD"><img src="<?php echo base_url('asset/pembeli/img/cod.jpg') ?>" width="60px" height="30px"></th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              <?php } ?>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <ul class="list-group">
                <?php
                $total = 0;
                $list2 = $this->db->get_where('keranjang', array('user' => $session));
                $data_list2 = $list2->result_array();
                foreach ($data_list2 as $row2) {
                ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $row2['nama_produk']; ?> <span>Rp. <?php echo number_format($row2['total_harga'], 2, ".", "."); ?></span>
                    <span class="badge badge-primary badge-pill"><?php echo $row2['qty']; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ongkos kirim<span>Gratis</span>
                    <span>.</span>
                  </li>
                <?php $total += $row2['total_harga'];
                } ?>
              </ul>
              <li>
                <h4>Total Pembayaran: Rp. <?php echo number_format($total, 2, ".", "."); ?></h4>
              </li>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="footer">
    <?php $this->load->view('pembeli/library/kaki'); ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>asset/pembeli/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi
        $("#kota-kabupaten").hide(); // Sembunyikan dulu combobox kota nya

        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("pembeli/listkota"); ?>", // Isi dengan url/path file php yang dituju
          data: {
            province_id: $("#provinsi").val()
          }, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response) { // Ketika proses pengiriman berhasil
            // set isi dari combobox kota
            // lalu munculkan kembali combobox kotanya
            $("#kota-kabupaten").html(response.list_kota).show();
          },
          error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });

    $(document).ready(function() {
      $("#kota-kabupaten").change(function() { // Ketika user mengganti atau memilih data provinsi
        $("#kecamatan").hide(); // Sembunyikan dulu combobox kota nya

        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("pembeli/listkecamatan"); ?>", // Isi dengan url/path file php yang dituju
          data: {
            regency_id: $("#kota-kabupaten").val()
          }, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response) { // Ketika proses pengiriman berhasil
            // set isi dari combobox kota
            // lalu munculkan kembali combobox kotanya
            $("#kecamatan").html(response.list_kecamatan).show();
          },
          error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });
  </script>


</body>

</html>
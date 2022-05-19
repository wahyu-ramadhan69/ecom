<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/pembeli/sip/fontawesome/css/all.min.css">
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <form method="post" action="<?= base_url('auth/proseslogin');?>" class="sign-in-form">
        <?php
        echo validation_errors();

        if($this->session->flashdata('sukses'))
        {
            echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
        }
        if($this->session->flashdata('error'))
        {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
      ?>
            <h2 class="title">Masuk</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Masuk" class="btn solid" />
            <p class="social-text">...</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form method="post" action="<?= base_url('auth/prosesregister');?>" class="sign-up-form">
          <?php
            echo validation_errors();
            if($this->session->flashdata('sukses'))
            {
                echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
            }
            if($this->session->flashdata('error'))
            {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
          ?>
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <textarea name="alamat" id="" cols="30" rows="10">masukkan alamat mu</textarea>
            </div>
            <input type="submit" class="btn" value="Daftar" />
            <p class="social-text">...</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum punya akun ?</h3>
            <p>
              Untuk dapat Login kamu harus memiliki akun terlebih dahulu,        
              syaratnya cuma Email!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
          <img src="<?php echo base_url('asset/img/log.svg') ?>" class="image" alt="" />
          
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah punya akun?</h3>
            <p>
              Langsung masuk saja.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Masuk
            </button>
          </div>
          <img src="<?php echo base_url('asset/img/register.svg') ?>" class="image" alt="" />
          
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <script src="<?php echo base_url(); ?>asset/pembeli/js/app.js"></script>
  </body>
</html>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets_2/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_2/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url(); ?>assets_2/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">

              <h4 class="mb-6">Welcome to Sistem Pendukung Keputusan! 👋</h4>

              <?php
                if(isset($_GET['alert'])){
                  if($_GET['alert']=="gagal"){
                    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                            Maaf! NIK & No. Telepon, Salah !
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                  }elseif($_GET['alert']=="belum_login"){
                    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                            Anda Harus Login Terlebih Dahulu!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                  }elseif($_GET['alert']=="logout"){
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
                            Anda Telah Logout!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                  }
                }
              ?>

              <form id="formAuthentication" class="mb-3" action="<?php echo base_url().'login/login_aksi' ?>" method="post">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nik"
                    name="nik"
                    placeholder="masukkan NIK"
                    required
                    autofocus
                  />
                </div>

                <div class="mb-3">
                  <label for="telepon" class="form-label">No. Telepon</label>
                  <input
                    type="text"
                    class="form-control"
                    id="telepon"
                    name="telepon"
                    placeholder="masukkan no telepon"
                    required
                    autofocus
                  />
                </div>
                
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary d-grid w-100" type="submit" value="Login">
                </div>
              </form>

              <p class="text-center">
                <a href="<?php echo base_url().'login/login_admin'; ?>">
                  <span>Login sebagai Admin?</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url(); ?>assets_2/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url(); ?>assets_2/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

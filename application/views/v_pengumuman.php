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
  class="light-style layout-menu-fixed"
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

    <title>Without menu - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_2/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_2/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_2/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_2/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_2/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php echo base_url() ?>assets_2/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <!-- Lolos  -->
                            <div class='alert alert-dismissible text-white' role='alert' style="background-color: #54B435;">
                                <div>
                                    <h3 class="text-white" style="line-height: 130%;">Anda Terdaftar Dalam Penerima Manfaat Bantuan Pangan Non Tunai (BPNT) !</h3>
                                </div>
                            </div>

                            <!-- Tidak lolos  -->
                            <!-- <div class='alert alert-dismissible text-white' role='alert' style="background-color: #FF0000;">
                                <div>
                                    <h3 class="text-white" style="line-height: 130%;">Maaf, Anda Tidak Terdaftar Dalam Penerima Manfaat Bantuan Pangan Non Tunai (BPNT) !</h3>
                                </div>
                            </div> -->

                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <!-- <td ><small class="text-light fw-semibold">NAMA</small></td> -->
                                                        <td colspan="2" class="py-3">
                                                            <p class="mb-0">
                                                                <div><small class="text-light fw-semibold">NIK : <?= $pengumuman->nik; ?></small></div>
                                                                <h1>
                                                                    <strong><?= $pengumuman->nama; ?></strong>
                                                                </h1>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small class="text-light fw-semibold">TELEPON</small></td>
                                                        <td class="py-3">
                                                            <p class="mb-0"><strong><?= $pengumuman->telepon; ?></strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small class="text-light fw-semibold">JENIS KELAMIN</small></td>
                                                        <td class="py-3">
                                                            <p class="mb-0"><strong><?= $pengumuman->jenis_kelamin; ?></strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small class="text-light fw-semibold">ALAMAT</small></td>
                                                        <td class="py-3">
                                                            <p class="mb-0"><strong><?= $pengumuman->alamat; ?></strong></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-3 col-md-8">
                                            <div class="mt-5">
                                                Penyaluran bantuan pangan secara non tunai lewat BPNT mengacu pada 4 (empat) prinsip umu yaitu : <br>
                                                <ul>
                                                  <li>Mudah dijangkau dan digunakan olek KPM</li>
                                                  <li>Memberikan lebih banyak pilihan dan kendali dalam memanfaatkan bantuan, kapak dan berapa banyak bahan pangan yang dibutuhkan.</li>
                                                  <li>Mendorong usha eceran rakyat untuk memperoleh pelanggan dan peningkatan penghasilan dengan melayani KPM</li>
                                                  <li>Memberikan akses jasa keuangan kepada usaha eceran rakyat dan KPM</li>
                                                </ul>
                                            </div>

                                            <div class=' mt-3 alert alert-info alert-dismissible' role='alert'>
                                                <p class="text-black">

                                                    <!-- lolos -->
                                                    <strong>
                                                      Anda Terdaftar Dalam Penerima Manfaat Bantuan Pangan Non Tunai (BPNT) Dinas Sosial Kab. Buton Tengah!
                                                    </strong>

                                                    <!-- tidak lolos -->
                                                    <!-- <strong>
                                                      Maaf, Anda Terdaftar Dalam Penerima Manfaat Bantuan Pangan Non Tunai (BPNT) Dinas Sosial Kab. Buton Tengah!
                                                    </strong> -->
                                                    <br>
                                                    Silahkan bawa KTP dan fotocopy Kartu Keluarga ke tempat BPNT Dinas Sosial Kab. Buton Tengah !
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            <!-- /Account -->
                            <div class="layout-demo-info">
                                <a class="btn btn-primary" href="<?= base_url('login'); ?>" type="button">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="layout-demo-placeholder">
                  <img
                    src="<?php echo base_url() ?>assets_2/assets/img/layouts/layout-without-menu-light.png"
                    class="img-fluid"
                    alt="Layout without menu"
                    data-app-light-img="layouts/layout-without-menu-light.png"
                    data-app-dark-img="layouts/layout-without-menu-dark.png"
                  />
                </div> -->
              
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url() ?>assets_2/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets_2/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url() ?>assets_2/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets_2/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url() ?>assets_2/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url() ?>assets_2/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

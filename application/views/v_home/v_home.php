<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$title?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css">
          <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.css') ?>">
        <link href="<?php echo base_url('assets/css/ampas.css')?>" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">KARITAS NANDAN</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#alur">Alur Pendaftaran</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Daftar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=base_url()?>pengumuman">Pengumuman</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="<?=base_url('assets/images/logo_sd.png')?>" alt="" /><!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">SD KARITAS NANDAN</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Jalan Nandan, Sariharjo, Ngaglik, Sleman, Yogyakarta.</p>
            </div>
        </header>

        <!-- About Section-->
        <section class="page-section mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tentang Sekolah</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-6 ml-auto"><p class="lead">Pendidikan di SD Karitas ini berlandaskan pada semboyan, Deus Caritas Est, yang artinya yaitu “Allah adalah cinta kasih”. Di SD Karitas Nandan ini, baik para siswa, guru, maupun sistem pendidikannya sendiri benar2 dilandaskan pada semboyan “Allah adalah cinta kasih”. Dengan St. Vincentius a Paulo sebagai Santo Pelindung sekolah ini, sang pendiri Kongregasi Bruder Karitas, yaitu Rm. Petrus Josef Triest (1760-1836), mewarisi semboyan nya pada Kongregasi dan juga pada buah karya mereka, seperti SD Karitas ini.</p></div>
                    <div class="col-lg-6 mr-auto"><p class="lead">SD Karitas adalah sebuah Sekolah Dasar yang diperuntukkan untuk umum dengan nafas pendidikan Katolik. SD Karitas berada di bawah pengelolaan Yayasan Karya Bakti yang dikelola oleh Bruder-bruder Karitas. SD Karitas menganut pendidikan heterogen. Selain merupakan sekolah heterogen pada umumnya, murid-murid SD Karitas tidak hanya berasal dari Pulau Jawa, tetapi juga terdapat pula siswa-siswa yang berasal dari Papua, Nias, Sumatra dan Kalimantan.</p></div>
                </div>

            </div>
        </section>

        <!-- About Section-->
        <section class="page-section mb-0" id="alur">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Alur Pendaftaran</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?=base_url('assets/images/1.png')?>" style="width:100%" alt="">
                    </div>
                </div>

            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar Sekarang</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="nama" type="text" placeholder="Masukkan Nama Lengkap" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('nama')?>" />
                                            <small class="text-danger"><?= form_error('nama') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>NISN </label>
                                            
                                            <input class="form-control" id="name" name="nisn" type="text" placeholder="NISN" data-validation-required-message="Please enter your name." value="<?php echo set_value('nisn')?>" />
                                            <small>belum memiliki NISN kosongkan</small>
                                            <small class="text-danger"><?= form_error('nisn') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                        <label>Tanggal lahir <span class="text-danger">*</span></label>
                                        <input type="text" name="tgl_lahir" class="form-control" placeholder="MM/DD/YYYY" value="<?php echo set_value('tgl_lahir')?>" id="datepicker" required="required">
                                        <small class="text-danger"><?= form_error('tgl_lahir') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" value="L" type="radio" id="male" name="gender">
                                                    <label for="male" class="custom-control-label">Laki - Laki</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" value="P" type="radio" id="female" name="gender">
                                                    <label for="female" class="custom-control-label">Perempuan</label>
                                                </div>
                                            </div>
                                            </div>
                                            <small class="text-danger"><?= form_error('gender') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Tempat Lahir <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="tempat_lahir" type="text" placeholder="Masukkan Tempat lahir" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('tempat_lahir')?>" />
                                            <small class="text-danger"><?= form_error('tempat_lahir') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Agama <span class="text-danger">*</span></label>
                                            <select name="agama" id="agama" class="form-control" placeholder="Pilih Agama" require>
                                                <option value="">Pilih Agama</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="budha">Budha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                            <small class="text-danger"><?= form_error('agama') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="form-group mb-0 pb-2">
                                    <label>Alamat <span class="text-danger">*</span></label><textarea class="form-control" id="message" rows="5" name="alamat" placeholder="Masukkan Alamat" required="required" data-validation-required-message="Please enter a message."><?php echo set_value('alamat')?></textarea>
                                    <small class="text-danger"><?= form_error('alamat') ?></small>
                                </div>
                            </div>
                            <h6 class="text-muted mt-3">Informasi Orang Tua / Wali</h6>
                            <hr>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Nama Orang Tua <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="nama_ortu" type="text" placeholder="Masukkan Nama Ortu" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('nama_ortu')?>" />
                                            <small class="text-danger"><?= form_error('nama_ortu') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Telepon Orang Tua <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="telepon_ortu" type="text" placeholder="Masukkan Telp Ortu" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('telepon_ortu')?>" />
                                            <small class="text-danger"><?= form_error('telepon_ortu') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Pekerjaan Orang Tua <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="pekerjaan" type="text" placeholder="Masukkan Pekerjaan Ortu" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('pekerjaan')?>" />
                                            <small class="text-danger"><?= form_error('pekerjaan') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group mb-0 pb-2">
                                            <label>Penghasilan Orang Tua <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" name="penghasilan" type="text" placeholder="Masukkan Penghasilan Ortu" required="required" data-validation-required-message="Please enter your name." value="<?php echo set_value('penghasilan')?>" />
                                            <small class="text-danger"><?= form_error('penghasilan') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group mb-0 pb-2">
                                    <label>Alamat Orang Tua <span class="text-danger">*</span></label><textarea class="form-control" id="message" name="alamat_ortu" rows="5" placeholder="Masukkan Alamat Ortu" required="required" data-validation-required-message="Please enter a message."><?php echo set_value('alamat_ortu')?></textarea>
                                    <small class="text-danger"><?= form_error('alamat_ortu') ?></small>
                                </div>
                            </div>
                            
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-block btn-primary btn-xl" id="sendMessageButton" type="submit">Daftar Sekarang!</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Alamat</h4>
                        <p class="lead mb-0">Nandan, Sariharjo, Ngaglik, Sleman, <br> DI. Yogyakarta, Indonesia</p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Sosial Media</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Semboyan Kami</h4>
                        <p class="lead mb-0">Deus Caritas Est <br> (Allah adalah cinta kasih)</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © SD Karitas Nandan 2020</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
        <!-- Toastr -->
        <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>

        <!-- bootstrap datepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script>
        $(function() {
            //Date picker
            $('#datepicker').datepicker({
            autoclose: true
            })
        })
        </script>

        <!-- Core theme JS-->
        <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>

        <script>
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 4000
            });
            });
        </script>

        <script>
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 4000
            });
            <?php 
            if($this->session->flashdata('msg_failed')){
            ?>
            Toast.fire({
                type: 'error',
                title: '<?= $this->session->flashdata('msg_failed')?>'
            });
            <?php 
            }elseif($this->session->flashdata('msg_success')){
            ?>
            Toast.fire({
                type: 'success',
                title: '<?= $this->session->flashdata('msg_success')?>'
            });
            <?php
            }
            ?>
        });
        </script>
    </body>
</html>

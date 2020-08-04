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

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">KARITAS NANDAN</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=base_url()?>#about">Tentang</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=base_url()?>#contact">Daftar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#">Pengumuman</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- About Section-->
        <section class="page-section mb-0 mt-5" id="pengumuman">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3">Pengumuman Penerimaan Siswa</h2>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tahun Ajaran <?=$tahun_ajaran?></h4>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Kode Pendaftaran</th>
                                    <th class="text-nowrap">NISN</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach($siswa AS $s) :

                                    if ($s['status'] == 'terima') {
                                        $status = '<label for="" style="background-color:#0abf27; padding:10px; color:#fff; border-radius:15px;">Diterima</label>';
                                    }else{
                                        $status = '<label for="" style="background-color:red; padding:10px; color:#fff; border-radius:15px;">Ditolak</label>';
                                    }
                                ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$s['kode_pendaftaran']?></td>
                                    <td><?=$s['nisn']?></td>
                                    <td><?=ucwords($s['nama_siswa'])?></td>
                                    <td><?=$status?></td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
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

        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

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
        });

        $(document).ready(function() {
            $('#example').DataTable();
        } );
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

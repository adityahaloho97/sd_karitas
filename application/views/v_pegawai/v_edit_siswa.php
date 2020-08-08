  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark"><?= ucwords($title) ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('pegawai/siswa') ?>">Daftar Siswa</a></li>
                          <li class="breadcrumb-item active">Perbarui Data Siswa</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="fa fa-user"></i> Perbarui Data Siswa</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="" method="post" role="form" enctype="multipart/form-data">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <label for="nama">Nama Lengkap <span class="text-danger">*</span> </label>
                                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" value="<?php if (!empty($siswa)) { echo $siswa['nama_siswa'];} else { echo set_value('nama');} ?>">
                                              <small class="text-danger mt-2"><?= form_error('nama') ?></small>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="nama">NISN <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN" value="<?php if (!empty($siswa)) {echo $siswa['nisn'];} else {echo set_value('nisn');} ?>">
                                              <small class="text-danger mt-2"><?= form_error('nisn') ?></small>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Jenis Kelamin <span class="text-danger">*</span></label>
                                      <div class="custom-control custom-radio">
                                          <input class="custom-control-input" value="L" type="radio" id="male" name="gender" <?php if ($siswa['jenis_kelamin'] == 'L') {
                                            echo 'checked';
                                          } ?>>
                                          <label for="male" class="custom-control-label">Laki - Laki</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input class="custom-control-input" value="P" type="radio" id="female" name="gender" <?php if ($siswa['jenis_kelamin'] == 'P') {
                                            echo 'checked';
                                          } ?>>
                                          <label for="female" class="custom-control-label">Perempuan</label>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Kelas</label>
                                            <select name="kelas" id="kelas" class="form-control select2bs4" data-placeholder="Pilih Kelas">
                                            <option value=""></option>
                                            <?php
                                            foreach($kelas AS $k) :
                                            ?>
                                            <option value="<?=$k['id_kelas']?>" <?php if($siswa['id_kelas'] == $k['id_kelas']){ echo 'selected';}?>><?=$k['nama_kelas']?></option>
                                            <?php 
                                            endforeach;
                                            ?>
                                            </select>
                                            <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                                        </div>
                                    </div> 
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="nama">Agama <span class="text-danger">*</span></label>
                                              <select name="agama" id="agama" class="form-control select2bs4" data-placeholder="Pilih Agama" require>
                                                  <option></option>
                                                  <option value="islam">Islam</option>
                                                  <option value="kristen">Kristen</option>
                                                  <option value="hindu">Hindu</option>
                                                  <option value="budha">Budha</option>
                                                  <option value="konghucu">Konghucu</option>
                                              </select>
                                              <small class="text-danger mt-2"><?= form_error('agama') ?></small>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <label for="visi">Tempat Lahir <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" name="tempat_lahir" id="nama" placeholder="Masukkan Tempat Lahir" value="<?php if (!empty($siswa)) {echo $siswa['tempat_lahir'];} else {echo set_value('tempat_lahir');} ?>">
                                              <small class="text-danger mt-2"><?= form_error('tempat_lahir') ?></small>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Tanggal Lahir <span class="text-danger">*</span></label>
                                              <div class="input-group">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="far fa-calendar-alt"></i>
                                                      </span>
                                                  </div>
                                                  <input type="text" name="tgl_lahir" class="form-control float-right" placeholder="Pilih tanggal" id="datepicker1" value="<?php if (!empty($siswa['tanggal_lahir'])) { echo DateTime::createFromFormat('Y-m-d', $siswa['tanggal_lahir'])->format('m/d/Y'); } else {   echo set_value('tanggal_lahir');} ?>">
                                              </div>
                                              <!-- /.input group -->
                                              <small class="text-danger mt-2"><?= form_error('tgl_lahir') ?></small>
                                          </div>
                                      </div>
                                  </div>
      
                                  <div class="form-group">
                                      <label for="misi">Alamat Rumah <span class="text-danger">*</span></label>
                                      <textarea id="misi" name="alamat" class="form-control" style="height: 150px;" placeholder="Masukkan Alamat Rumah"><?php if (!empty($siswa)) { echo $siswa['alamat']; } else { echo set_value('alamat');} ?></textarea>
                                      <small class="text-danger mt-2"><?= form_error('alamat') ?></small>
                                  </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama">Nama Orang Tua <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="nama_ortu" id="nama" placeholder="Masukkan Nama Ortu" value="<?php if (!empty($siswa)) { echo $siswa['nama_ortu'];} else { echo set_value('nama_ortu');} ?>">
                                            <small class="text-danger mt-2"><?= form_error('nama_ortu') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nama">Telepon Orang Tua <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="telp_ortu" id="nisn" placeholder="Masukkan Telp Ortu" value="<?php if (!empty($siswa)) {echo $siswa['telepon_ortu'];} else {echo set_value('telp_ortu');} ?>">
                                            <small class="text-danger mt-2"><?= form_error('telp_ortu') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama">Pekerjaan Orang Tua <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="pekerjaan_ortu" id="nama" placeholder="Masukkan Pekerjaan Ortu" value="<?php if (!empty($siswa)) { echo $siswa['pekerjaan_ortu'];} else { echo set_value('pekerjaan_ortu');} ?>">
                                            <small class="text-danger mt-2"><?= form_error('pekerjaan_ortu') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nama">Penghasilan Orang Tua <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="penghasilan_ortu" id="nisn" placeholder="Masukkan Penghasilan Ortu" value="<?php if (!empty($siswa)) {echo $siswa['penghasilan_ortu'];} else {echo set_value('penghasilan_ortu');} ?>">
                                            <small class="text-danger mt-2"><?= form_error('penghasilan_ortu') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                      <label for="misi">Alamat Orang Tua <span class="text-danger">*</span></label>
                                      <textarea id="misi" name="alamat_ortu" class="form-control" style="height: 150px;" placeholder="Masukkan Alamat Ortu"><?php if (!empty($siswa)) { echo $siswa['alamat_ortu']; } else { echo set_value('alamat_ortu');} ?></textarea>
                                      <small class="text-danger mt-2"><?= form_error('alamat_ortu') ?></small>
                                  </div>

                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary float-right">Simpan!</button>
                              </div>
                          </form>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
      </section>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('templates/cdn_admin'); ?>

  <!-- bootstrap datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
  </script>

  <script>
      $(function() {
          //Date picker
          $('#datepicker1').datepicker({
              autoclose: true
          })
      })
  </script>

  <script>
      $(function() {
          //Date picker
          $('#datepicker2').datepicker({
              autoclose: true,
              format: 'yyyy',
              viewMode: "years",
              minViewMode: "years"
          })
      });

      $(function() {
          //Date picker
          $('#datepicker3').datepicker({
              autoclose: true,
              format: 'yyyy',
              viewMode: "years",
              minViewMode: "years"
          })
      });
  </script>

  <script>
      var loadFile1 = function(event) {
          var output = document.getElementById('output1');
          output.src = URL.createObjectURL(event.target.files[0]);
      };

      var loadFile2 = function(event) {
          var output = document.getElementById('output2');
          output.src = URL.createObjectURL(event.target.files[0]);
      };
  </script>
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
                          <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item active"><?= ucwords($title) ?></li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i>Data Siswa Naik Kelas</h3> <br>
                              <small>Pilih siswa dibawah ini untuk naik kelas</small>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">Nama</th>
                                 <th class="text-nowrap">NISN</th>
                                 <th class="text-nowrap">Kelas</th>
                                 <th class="text-nowrap">Jenis Kelamin</th>
                                 <th class="text-nowrap">Lihat Raport</th>
                               </tr>
                             </thead>
                             <tbody>
                                 <?php
                                 $no = 1;
                                    foreach($siswa AS $s) :

                                    switch($s['kelamin']){
                                        case 'L':
                                            $gender = 'Laki - Laki';
                                        break;

                                        case 'P':
                                            $gender = 'Perempuan';
                                        break;
                                    }
                                 ?>
                                <tr>
                                    <td><?=$no++?></td>
                                  <td><?=ucwords($s['nama_siswa'])?></td>
                                  <td><?=$s['nisn']?></td>
                                  <td><?=ucwords($s['nama_kelas'])?></td>
                                  <td><?=$gender?></td>
                                  <td><a href="<?=base_url('guru/raport/download/'.$s['nisn'])?>" class="btn btn-primary">Raport</a></td>
                                  
                                </tr>
                                <?php
                                endforeach;
                                ?>
                             </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                         </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
      </section>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('templates/cdn_admin'); ?>

  <script>
      $(function() {
     $("#example1").DataTable({});
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
     });
   });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  </script>
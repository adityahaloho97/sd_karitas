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
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item active">Daftar GTK</li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i> Tabel Daftar Pegawai</h3>
                             
                              <a href="<?php echo base_url('admin/pegawai/tambah')?>" class="btn btn-sm btn-primary float-right ml-3"><i class="fa fa-plus"></i> Tambah Pegawai</a>
                              <a href="<?php echo base_url('admin/pegawai/laporan')?>" class="btn btn-sm btn-warning float-right ml-3"><i class="fa fa-download"></i> Download Laporan Pegawai </a>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">NIP</th>
                                 <th class="text-nowrap">Nama</th>
                                 <th class="text-nowrap">NIK</th>
                                 <th class="text-nowrap" style="width: 10%">Jenis Kelamin</th>
                                 <th class="text-nowrap" style="width: 15%">Telepon</th>
                                 <th class="text-nowrap" style="width: 13%">Status</th>
                                 <th style="width: 10%">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach($gtk AS $k) :
                                switch($k['kelamin']){
                                    case 'L' :
                                        $gender = 'Laki - Laki';
                                    break;

                                    case 'P' :
                                        $gender = 'Perempuan';
                                    break;
                                }

                                switch($k['hak_akses']){
                                    case 'guru' :
                                        $label = 'success';
                                    break;

                                    case 'pegawai' :
                                        $label = 'warning';
                                    break;
                                }
                             ?>
                              <tr>
                                <td><?=$no++?></td>
                                <td><?= !empty($k['nip'])?$k['nip']:'Kosong'; ?></td>
                                <td><?=ucwords($k['nama'])?></td>
                                <td><?= !empty($k['nik'])?$k['nik']:'Kosong'; ?></td>
                                <td><?=$gender?></td>
                                <td><?=$k['telepon']?></td>
                                <td><label class="btn btn-sm btn-<?=$label?>"><?php echo ucwords($k['hak_akses'])?></label></td>
                                <td><a href="<?=base_url('admin/pegawai/update/').$k['id_tenaga_kependidikan']?>" class="btn btn-sm btn-primary mr-3 update"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" id="<?=$k['id_tenaga_kependidikan']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a></td>
                              </tr>
                             <?php endforeach; ?>
                             </tbody>
                           </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>

              <div class="modal fade" id="modal-lg">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Edit <span id="nama2"></span></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                      <form action="<?= base_url('admin/kelas/update') ?>" method="post" role="form">
                        <input type="hidden" name="id" id="id_kelas" value="">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas_update" placeholder="Masukkan Nama Kelas" value="">
                            <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                     </form>
                   </div>
                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
             </div>
             <!-- /.modal -->
          </div>
      </section>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('templates/cdn_admin'); ?>

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
     $("#example1").DataTable({});
     $('#example2').DataTable({
      "order": [[ 0, 'asc' ]],
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
     });
   });


   $('.update').on('click', function() {
     var dataId = this.id;
     $.ajax({
       type: "post",
       url: "<?= base_url('admin/kelas/update') ?>",
       data: {
         'id_get_update': dataId
       },
       dataType: "json",
       success: function(data) {
          $('#nama2').text(data.nama_kelas);     
          $('#kelas_update').val(data.nama_kelas);
          $('#id_kelas').val(data.id_kelas);  
       },
     });
   });

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;

     console.log(dataId);
     Swal.fire({
       title: 'Hapus Data GTK',
       text: "Apakah anda yakin ingin menghapus data GTK ini?",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya, Hapus!'
     }).then(
       function(isConfirm) {
         if (isConfirm.value) {
           $.ajax({
             type: "post",
             url: "<?= base_url() ?>admin/pegawai/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('admin/pegawai') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('admin/pegawai') ?>";
             },
           });
         } else {
           swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
       });
   });
 </script>
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
                          <li class="breadcrumb-item active">Daftar Mengajar</li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i> Tabel Daftar Mengajar</h3>
                             
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-add" class="btn btn-sm btn-primary float-right ml-3"><i class="fa fa-plus"></i> Tambah Guru mengajar</a>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">Guru</th>
                                 <th class="text-nowrap">Kelas</th>
                                 <th class="text-nowrap">Mapel</th>
                                 <th style="width: 15%">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach($mengajar AS $m) :
                             ?>
                              <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($m['nama'])?></td>
                                <td><?=ucwords($m['nama_kelas'])?></td>
                                <td><?php echo ucwords($m['nama_mapel'])?></td>
                                <td><a href="javascript:void(0)" data-toggle="modal" id="<?=$m['id']?>" data-target="#modal-lg" class="btn btn-sm btn-primary mr-3 update"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" id="<?=$m['id']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a></td>
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

              <!-- modal tambah -->
              <div class="modal fade" id="modal-add">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Tambah Guru Mengajar</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                      <form action="<?= base_url('admin/mengajar/tambah') ?>" method="post" role="form">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label >Pilih Guru</label>
                            <select name="guru" id="guru" class="form-control select2bs4" data-placeholder="Pilih Tenaga Pendidik">
                                <option></option>
                                <?php 
                                foreach ($guru as $g) {
                                  echo '<option value="'.$g['id_tenaga_kependidikan'].'">'.$g['nama'].'</option>';
                                }
                                 ?>
              
                            </select>
                            <small class="text-danger mt-2"><?= form_error('status') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label >Pilih Kelas</label>
                            <select name="kelas" id="kelas" class="form-control select2bs4" data-placeholder="Pilih kelas">
                                <option></option>
                                <?php 
                                foreach ($kelas as $k) {
                                  echo '<option value="'.$k['id_kelas'].'">'.$k['nama_kelas'].'</option>';
                                }
                                 ?>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('status') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label >Pilih Mata Pelajaran</label>
                            <select name="mapel" id="mapel" class="form-control select2bs4" data-placeholder="Pilih Mata Pelajaran">
                                <option></option>
                               
                            </select>
                            <small class="text-danger mt-2"><?= form_error('status') ?></small>
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
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
     });
   });


   $('#kelas').on('change', function() {
     var dataId = $('#kelas').val();
     $.ajax({
       type: "post",
       url: "<?= base_url('admin/mengajar/get_kelas') ?>",
       data: {
         'id_kelas': dataId
       },
       dataType: "json",
       success: function(data) {

        var html = '<option></option>';
        var i;

        for(i=0; i < data.length; i++){
          html += '<option value="'+data[i].kode_mapel+'">'+data[i].nama_mapel+'</option>'
        }

        $('#mapel').html(html);
          
       },
     });
   });

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Guru Mengajar',
       text: "Apakah anda yakin ingin menghapus data ini?",
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
             url: "<?= base_url() ?>admin/mengajar/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('admin/mengajar') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('admin/mengajar') ?>";
             },
           });
         } else {
           swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
       });
   });
 </script>
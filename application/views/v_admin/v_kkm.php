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
                          <li class="breadcrumb-item active">Daftar KKM</li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i> Tabel Daftar KKM</h3>
                             
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-add" class="btn btn-sm btn-primary float-right ml-3"><i class="fa fa-plus"></i> Tambah KKM</a>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">KKM</th>
                                 <th class="text-nowrap">Nama Mapel</th>
                                 <th class="text-nowrap">Nama Kelas</th>
                                 <th style="width: 15%">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                             $no = 1;
                             foreach($kkm AS $m) :
                             ?>
                              <tr>
                                <td><?=$no++?></td>
                                <td><?php echo $m['kkm'] ?></td>
                                <td><?= ucwords($m['nama_mapel'])?></td>
                                <td><?= ucwords($m['nama_kelas'])?></td>
                                <td><a href="javascript:void(0)" data-toggle="modal" id="<?php echo $m['id_kkm'] ?>" data-target="#modal-lg" class="btn btn-sm btn-primary mr-3 update"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" id="<?php echo $m['id_kkm'] ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a></td>
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
                     <h4 class="modal-title">Tambah KKM</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                      <form action="<?= base_url('admin/kkm/tambah') ?>" method="post" role="form">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">Pilih Kelas</label>
                            <select name="kelas" class="form-control select2bs4" id="kelas" data-placeholder="Pilih Kelas">
                                <option value=""></option>
                                <?php
                                foreach($kelas AS $m){
                                    echo '<option value="'.$m['id_kelas'].'">'.ucwords($m['nama_kelas']).'</option>';
                                }
                                ?>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">Pilih Mapel</label>
                            <select name="mapel" class="form-control select2bs4" id="mapel" data-placeholder="Pilih Mata Pelajaran">
                                <option value=""></option>
                                
                            </select>
                            <small class="text-danger mt-2"><?= form_error('mapel') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">KKM</label>
                            <input type="text" class="form-control" name="kkm" id="" placeholder="Masukkan KKM" value="<?php echo set_value('kkm'); ?>">
                            <small class="text-danger mt-2"><?= form_error('kkm') ?></small>
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
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Edit KKM</span></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                      <form action="<?= base_url('admin/kkm/update') ?>" method="post" role="form">
                      <input type="hidden" name="id" id="id_kkm" value="">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">Pilih Kelas</label>
                            <select name="kelas" class="form-control select2bs4" id="kelas_update" data-placeholder="Pilih Kelas">
                                
                            </select>
                            <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">Pilih Mapel</label>
                            <select name="mapel" class="form-control select2bs4 mapel" id="mapel_update" data-placeholder="Pilih Mata Pelajaran">
                                <option value=""></option>
                                
                            </select>
                            <small class="text-danger mt-2"><?= form_error('mapel') ?></small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="kelas">KKM</label>
                            <input type="text" class="form-control" name="kkm" id="kkm_update" placeholder="Masukkan KKM" value="<?php echo set_value('kkm'); ?>">
                            <small class="text-danger mt-2"><?= form_error('kkm') ?></small>
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

   $('#kelas_update').on('change', function(){
       var id_kelas = $('#kelas_update').val();
       $.ajax({
            type : "post",
            url : "<?= base_url('admin/kkm/get_mapel')?>",
            data : {
                'id_kelas' : id_kelas
            },
            dataType : "json",
            success : function(data){
                var html = '<option></option>';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].kode_mapel+'">'+data[i].nama_mapel+'</option>';
                }

                $('.mapel').html(html)
            }
       })
   });


   $('.update').on('click', function() {
     var dataId = this.id;
     $.ajax({
       type: "post",
       url: "<?= base_url('admin/kkm/update') ?>",
       data: {
         'id_get_update': dataId
       },
       dataType: "json",
       success: function(data) {
          $('#id_kkm').val(data.id_kkm);     
          $('#kelas_update').val(data.id_kelas).change();
          $('#kkm_update').val(data.kkm);
          $.ajax({
            type : "post",
            url : "<?= base_url('admin/kkm/get_kelas')?>",
            dataType : "json",
            success : function(req){
                var html = '<option></option>';
                var i;

                for(i=0; i<req.length; i++){
                  if(req[i].id_kelas == data.id_kelas){
                    var select = 'selected';
                  }else{
                    var select = '';
                  }
                    html += '<option value="'+req[i].id_kelas+'" '+select+'>'+req[i].nama_kelas+'</option>';
                }

                $('#kelas_update').html(html)
            }
          });

          $.ajax({
            type : "post",
            url : "<?= base_url('admin/kkm/get_mapel')?>",
            data : {
                'id_kelas' : data.id_kelas
            },
            dataType : "json",
            success : function(res){
                var html = '<option></option>';
                var i;

                for(i=0; i<res.length; i++){
                  if(res[i].kode_mapel == data.kode_mapel){
                    var select = 'selected';
                  }else{
                    var select = '';
                  }

                    html += '<option value="'+res[i].kode_mapel+'" '+select+'>'+res[i].nama_mapel+'</option>';
                }

                $('#mapel_update').html(html)
            }
          });          
       },
     });
   });

   $('#kelas').on('change', function(){
       var id_kelas = $('#kelas').val();
       $.ajax({
            type : "post",
            url : "<?= base_url('admin/kkm/get_mapel')?>",
            data : {
                'id_kelas' : id_kelas
            },
            dataType : "json",
            success : function(data){
                var html = '<option></option>';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].kode_mapel+'">'+data[i].nama_mapel+'</option>';
                }

                $('#mapel').html(html)
            }
       })
   });

  

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Mapel',
       text: "Apakah anda yakin ingin menghapus data Mapel ini?",
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
             url: "<?= base_url() ?>admin/kkm/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('admin/kkm') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('admin/kkm') ?>";
             },
           });
         } else {
           swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
       });
   });
 </script>
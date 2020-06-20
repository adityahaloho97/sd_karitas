<?php
$project = explode('/', $_SERVER['REQUEST_URI'])[1];
?>


<!DOCTYPE html>
<html>
<head>
  <title>Laporan Data Alumni</title>
  <style type="text/css">
    .table-me{
      font-size: 14px;
      width: 100%;
      text-align: center;
    }

    .table-me thead{
      border-bottom: 2px solid #000; 
      margin-bottom: 5px;
    }

    .header .header-text{
      text-align: center;
    }

    .header .header-text small{
      font-size: 12px;
      color: #333 ;
    }

    .table-me tbody{
      border-bottom: 2px solid #eaeaea !important;
    }
  </style>
</head>
<body>
  <div id="outtable">
    <div class="header">
      <table border="0" width="100%">
        <tr>
          <td width="10">
            <div class="header-img">
              <img style="width: 100px; height: 100px; border-radius: 5px;" src="c:/xampp/htdocs/<?=$project?>/assets/images/logo_sd.png">
            </div>
          </td>
          <td width="100%">
            <div class="header-text">
              <h2>Laporan Guru Tenaga Kependidikan<br> SD KARITAS NANDAN</h2>
              <small>Jalan Nandan, Sariharjo, Ngaglik, Sleman, Yogyakarta.</small>
            </div>
          </td>
        </tr>
      </table>
    </div>
      
      <!-- <p>SMK Muhammadiyah Mlati <span style="margin-left: 270px;">No.Pendaftaran : </span></p> -->
      <hr>
      <div style="overflow-x:auto;">
      <table class="table-me" border="0" cellpadding="3">
        <thead>
          <tr>
            <th style="width: 3%">No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th style="width: 15%">TTL</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($gtk)) :
            $no = 1;
            foreach($gtk AS $a) :  
                $tgl = DateTime::createFromFormat('Y-m-d', $a['tanggal_lahir'])->format('d F Y'); 

                switch($a['kelamin']){
                    case 'P':
                      $gender = 'Perempuan';
                    break;

                    case 'L':
                      $gender = 'Laki - Laki';
                    break;
                }
          ?>
          <tr>
            <td><?=$no++?></td>
            <td><?php echo ucwords($a['nip'])?></td>
            <td><?php echo ucwords($a['nama'])?></td>
            <td><?php echo ucwords($a['nik'])?></td>
            <td><?php echo $gender?></td>
            <td><?php echo ucwords($a['tempat_lahir'])?> - <?=$tgl?></td>
            <td><?php echo $a['telepon']?></td>
            <td><?php echo $a['alamat']?></td>
            <td><?php echo $a['hak_akses']?></td>
          </tr>
            <?php 
                endforeach;
            else :
            ?>
            <tr>
                <td colspan="10" style="text-align: center; margin-top: 50px; margin-bottom: 50px;">--- Belum Ada Data ---</td>
            </tr>
            <?php
            endif;
            ?>

        </tbody>   
      </table>
    </div>
   </div>
</body>
</html>
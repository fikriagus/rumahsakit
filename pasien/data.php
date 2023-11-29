<?php include_once('../_header.php'); ?>

<div class="box">
  <h1>Pasien</h1>
  <h4>
    <small>Data Pasien</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-push"></i> Tambah Pasien</a>
      <a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import"></i> Import Pasien</a>
    </div>
  </h4>

  <div class="table-responsive">
    <table class="table table-striped table-bordered tabel-hover" id="pasien">
      <thead>
          <tr>
            <th>No.</th>
            <th>Nomor Identitas</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No.telpon</th>
            <th><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
      </thead>
      <tbody>
      <?php
            $no = 1;
            $query = "SELECT * FROM tb_pasien 
            INNER JOIN tb_regis_pasien ON tb_pasien.nama_pasien = tb_regis_pasien.id_regis
            
            ";
            $sql_pasien = mysqli_query($con, $query) or die (mysqli_error($con));
            while ($data = mysqli_fetch_array($sql_pasien)){?>
                <tr>
                  <td><?=$no++?>.</td>
                  <td><?=$data['nomor_identitas']?></td>
                  <td><?=$data['nama_pasien']?></td>
                  <td><?=$data['jenis_kelamin']?></td>
                  <td><?=$data['alamat']?></td>
                  <td><?=$data['no_telp']?></td>
                  <td><a href="del.php?id=<?=$data['id_pasien']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"><i class="glyphicon glyphicon-trash"></i></a> <a href="edit.php?id=<?=$data['id_pasien']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
           </td>
                </tr>
            <?php
            } ?>
      </tbody>
    </table>
  </div>
  <script>
  $(document).ready(function(){
    $('#pasien').DataTable( {
      
      columnDefs : [
        {
          "searchable" : false,
          "orderable" : false,
          "targets" : 6,
          
      }
    
    ]
    } );
  } );
  </script>
</div>


<?php include_once('../_footer.php'); ?>
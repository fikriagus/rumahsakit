<?php include_once('../_header.php'); ?>

<div class="box">
  <h1>Registrasi</h1>
  <h4>
    <small>Data Registrasi</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-push"></i> Tambah Registrasi</a>
    </div>
  </h4>
  <div class="table-responsive">
    <table class="table table-striped table-bordered tabel-hover" id="regis">
      <thead>
          <tr>
            <th>No.</th>
            <th>Nama Pasien</th>
            <th>Keluhan</th>
            <th>Poli</th>
            <th><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
      </thead>
      <tbody>
          <?php
            $no = 1;
            $query = "SELECT * FROM tb_regis_pasien 
            INNER JOIN tb_poliklinik ON tb_regis_pasien.id_poli = tb_poliklinik.id_poli
            
            ";
            $sql_regis = mysqli_query($con, $query) or die (mysqli_error($con));
            while ($data = mysqli_fetch_array($sql_regis)){?>
                <tr>
                  <td><?=$no++?>.</td>
                  <td><?=$data['nama_pasien']?></td>
                  <td><?=$data['keluhan']?></td>
                  <td><?=$data['nama_poli']?></td>
                  <td>
                  <a href="del.php?id=<?=$data['id_regis']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
            <?php
            } ?>
      </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#regis').DataTable({
              columnDefs:[
                  {
                    "searchable": false,
                    "orderable" : false,
                    "targets" : 4
                  }
              ]
            });
          });
    </script>
</div>

<?php include_once('../_footer.php'); ?>
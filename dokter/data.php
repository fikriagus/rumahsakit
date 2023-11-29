<?php include_once('../_header.php'); ?>

<div class="box">
  <h1>Dokter</h1>
  <h4>
    <small>Data Dokter</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-push"></i> Tambah Dokter</a>
    </div>
  </h4>
  <form method="post" name="proses">
  <div class="table-responsive">
    <table class="table table-striped table-bordered tabel-hover" id="dokter">
      <thead>
          <tr>
            <th>
              <center>
                <input type="checkbox" id="select_all" value="">
              </center>
            </th>
            <th>No.</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Alamat</th>
            <th>No.telpon</th>
            <th><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        $sql_poli= mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));

        while($data = mysqli_fetch_array($sql_poli)){?>
          <tr>
            <td align="center">
            <input type="checkbox" name="checked[]" id="checked" class="check" value="<?=$data['id_dokter']?>">
            </td>
            <td><?=$no++ ?>.</td>
            <td><?=$data['nama_dokter']?></td>
            <td><?=$data['spesialis']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['no_telp']?></td>
            <td class="text-center">
              <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
            </td>
          </tr>
          <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  </from>

  <div class="box pull-right" >
    <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
  </div>
</div>
<script>
  $(document).ready(function() {

    $('#dokter').DataTable({
      columnDefs:[
        {
          "searchable": false,
          "orderable" : false,
          "targets" : [0,6]
        }
      ],
      "order" : [1, "asc"]
    });
    $('#select_all').on('click', function(){
      if(this.checked){
        $('.check').each(function(){
          this.checked=true;
        })
      }else{
        $('.check').each(function(){
          this.checked=false
        })
      }
    });
    $('.check').on('click', function(){
      if($('.check:checked').length == $('.check').length){
        $('#select_all').prop('checked',true);
      }else{
        $('#select_all').prop('checked',false);
      }
    })
  });

  function hapus(){
    var conf = confirm('Yakin akan mengahapus data ini?');
    if(conf){
      document.proses.action='del.php';
      document.proses.submit();
    }
    
  }
</script>

<?php include_once('../_footer.php'); ?>
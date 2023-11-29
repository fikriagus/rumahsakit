<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Perawat</h1>
  <h4>
    <small>Edit Data Perawat</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php
      $id = @$_GET['id'];
      $sql_perawat = mysqli_query($con, "SELECT * FROM tb_perawat WHERE id_perawat = '$id'") or die(mysqli_error($con));
      $data = mysqli_fetch_array($sql_perawat);
      ?>
      <form action="proses.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Perawat</label>
            <input type="hidden" name="id" value="<?=$data['id_perawat']?>" >
            <input type="text" name="nama" id="nama" value="<?=$data['nama_perawat']?>" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required  ><?=$data['alamat']?></textarea>
        </div>
        
        <div class="form-group">
            <label for="telp">No.Telepon</label>
            <input type="telp" name="telp" id="telp" value="<?=$data['no_telp']?>" class="form-control" required>
        </div>
        <div class="form-group pull-right">
            <input type="submit" name="edit" value="simpan" class="btn btn-success">
        </div>
      </form>

    </div>
  </div>
</div>

<?php include_once('../_footer.php');?>
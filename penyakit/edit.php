<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Penyakit</h1>
  <h4>
    <small>Edit Data Penyakit</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php
      $id = @$_GET['id'];
      $sql_penyakit = mysqli_query($con, "SELECT * FROM tb_penyakit WHERE id_penyakit = '$id'") or die(mysqli_error($con));
      $data = mysqli_fetch_array($sql_penyakit);
      ?>
      <form action="proses.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Penyakit</label>
            <input type="hidden" name="id" value="<?=$data['id_penyakit']?>" >
            <input type="text" name="nama" id="nama" value="<?=$data['nama_penyakit']?>" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <textarea name="ket" id="ket" class="form-control" required  ><?=$data['keterangan']?></textarea>
        </div>
        <div class="form-group pull-right">
            <input type="submit" name="edit" value="simpan" class="btn btn-success">
        </div>
      </form>

    </div>
  </div>
</div>

<?php include_once('../_footer.php');?>
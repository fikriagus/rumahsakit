<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Perawat</h1>
  <h4>
    <small>Tambah Data Perawat</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Perawat</label>
            <input type="text" name="nama" id="nama" class="form-control" require autofocus>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="telp">No. Telepon</label>
            <input type="number" name="telp" id="telp" class="form-control" require>
        </div>
        <div class="form-group pull-right">
            <input type="submit" name="add" value="simpan" class="btn btn-success">
        </div>
      </form>

    </div>
  </div>
</div>

<?php include_once('../_footer.php');?>
<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Registrasi Pasien</h1>
  <h4>
    <small>Tambah Data Registrasi Pasien</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses.php" method="post">
      <div class="form-group">
            <label for="pasien">Nama Pasien</label>
            <input type="text" name="pasien" id="pasien" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="poli">Poliklinik</label>
            <select name="poli" id="poli" class="form-control" reuired>
                <option value="">- pilih data -</option>
                <?php
                $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con));
                while($data_poli = mysqli_fetch_array($sql_poli)){
                  echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group pull-right">
            <input type="submit" name="add" value="simpan" class="btn btn-success">
        <div class="form-group pull-right">
            <input type="reset" name="reset" value="Reset" class="btn btn-default">
        </div>
      </form>

    </div>
  </div>
</div>

<?php include_once('../_footer.php');?>
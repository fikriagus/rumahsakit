<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Pasien</h1>
  <h4>
    <small>Tambah Data Pasien</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses.php" method="post">
        <div class="form-group">
            <label for="identitas">Nomor Identitas</label>
            <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="pasien">Nama Pasien</label>
            <select name="pasien" id="pasien" class="form-control" reuired>
                <option value="">- pilih data -</option>
                <?php
                $sql_pasien = mysqli_query($con, "SELECT * FROM tb_regis_pasien") or die (mysqli_error($con));
                while($data_pasien = mysqli_fetch_array($sql_pasien)){
                  echo '<option value="'.$data_pasien['id_regis'].'">'.$data_pasien['nama_pasien'].'</option>';
                }
                ?>
            </select>
           </div>
        <div class="form-group">
            <label for="jk">Jennis Kelamin</label>
            <div>
              <label class="radio-inline">
                <input type="radio" name="jk" id="jk" value="L" required> Laki-Laki
              </label>
              <label class="radio-inline">
                <input type="radio" name="jk" value="P" > Perempuan
              </label>
            </div>
            <br>
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
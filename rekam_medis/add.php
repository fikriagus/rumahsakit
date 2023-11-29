<?php include_once('../_header.php');
?>

<div class="box">
  <h1>Rekam Medis</h1>
  <h4>
    <small>Tambah Data Rekam Medis</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses.php" method="post">
        <div class="form-group">
            <label for="pasien">Nama Pasien</label>
            <select name="pasien" id="pasien" class="form-control" reuired autofocus>
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
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="dokter">Nama Dokter</label>
            <select name="dokter" id="dokter" class="form-control" reuired>
                <option value="">- pilih data -</option>
                <?php
                $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                while($data_dokter = mysqli_fetch_array($sql_dokter)){
                  echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="penyakit">Diagnosa</label>
            <select name="penyakit" id="penyakit" class="form-control" reuired>
                <option value="">- pilih data -</option>
                <?php
                $sql_penyakit = mysqli_query($con, "SELECT * FROM tb_penyakit") or die (mysqli_error($con));
                while($data_penyakit = mysqli_fetch_array($sql_penyakit)){
                  echo '<option value="'.$data_penyakit['id_penyakit'].'">'.$data_penyakit['nama_penyakit'].'</option>';
                }
                ?>
            </select>
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
        <div class="form-group">
            <label for="obat">Obat</label>
            <select multiple name="obat[]" id="obat" class="form-control" size="7" reuired>
                <?php
                $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die (mysqli_error($con));
                while($data_obat = mysqli_fetch_array($sql_obat)){
                  echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Biaya Pemeriksaan</label>
            <input type="text" name="harga" id="harga"  class="form-control">
        </div>
        <div class="form-group">
            <label for="tgl">Tanggal Pemeriksaan</label>
            <input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control">
        </div>
        <div class="form-group pull-right">
            <input type="submit" name="add" value="simpan" class="btn btn-success">
        <div class="form-group pull-right">
            <input type="reset" name="reset" value="Reset" class="btn btn-default">
        </div>
      </form>

    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="autofill.js"></script>
</div>

<?php include_once('../_footer.php');?>
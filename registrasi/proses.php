<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
  $uuid = Uuid::uuid4()->toString();
  $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
  $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
  $poliklinik = trim(mysqli_real_escape_string($con, $_POST['poli']));
  mysqli_query($con, "INSERT INTO tb_regis_pasien (id_regis, nama_pasien, keluhan, id_poli) VALUES ('$uuid','$pasien', '$keluhan', '$poliklinik')") or die (mysqli_error($con));
  echo"<script>window.location='data.php'</script>";
}else if(isset($_POST['edit'])){}

?>
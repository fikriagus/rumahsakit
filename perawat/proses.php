<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
  $uuid = Uuid::uuid4()->toString();
  $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
  mysqli_query($con, "INSERT INTO tb_perawat (id_perawat, nama_perawat, alamat, no_telp) VALUES ('$uuid','$nama','$alamat','$telp')") or die (mysqli_error($con));
  echo"<script>window.location='data.php'</script>";
}else if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
  mysqli_query($con, "UPDATE tb_perawat SET nama_perawat = '$nama', alamat = '$alamat', no_telp='$telp' WHERE id_perawat = '$id'") or die (mysqli_error($con));
  echo"<script>window.location='data.php'</script>";
}

?>
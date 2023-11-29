<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
  $uuid = Uuid::uuid4()->toString();
  $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
  $nama = trim(mysqli_real_escape_string($con, $_POST['pasien']));
  $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
  $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
  $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas='$identitas'") or die (mysqli_error($con));
  if(mysqli_num_rows($sql_cek_identitas)>0){
    echo"<script>alert('Nomer Identitas Sudah Tersedia!!!'); window.location='add.php'</script>";
  }else {
  mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid','$identitas','$nama','$jk','$alamat','$telp')") or die (mysqli_error($con));
  echo"<script>window.location='data.php'</script>";
  }
}else if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
  $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
  $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
  $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas='$identitas' AND id_pasien !='$id'") or die (mysqli_error($con));
  if(mysqli_num_rows($sql_cek_identitas)>0){
    echo"<script>alert('Nomer Identitas Milik Pasein Lain!!!'); window.location='edit.php?id=$id'</script>";
  }else {
  mysqli_query($con, "UPDATE tb_pasien SET nomor_identitas='$identitas', nama_pasien='$nama', jenis_kelamin='$jk', alamat='$alamat', no_telp='$telp' WHERE id_pasien='$id'") or die (mysqli_error($con));
  echo"<script>window.location='data.php'</script>";
  }
}else if(isset($_POST['import'])){
  $file = $_FILES['file']['name'];
  $ekstensi = explode(".", $file);
  $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
  $sumber = $_FILES['file']['tmp_name'];
  $target_dir = "../_file/";
  $target_file = $target_dir . $file_name; // Perbaikan: gunakan $file_name bukan $target_file
  move_uploaded_file($sumber, $target_file);

  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($target_file);
  $spreadsheet = $reader->load($target_file);
  $worksheet = $spreadsheet->getActiveSheet();
  $all_data = $worksheet->toArray();

  $sql = "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";
  for ($i=2; $i < count($all_data) ; $i++) { 
    $uuid = Uuid::uuid4()->toString();
    $no_id = $all_data[$i]['0'];
    $nama = $all_data[$i]['1'];
    $jk = $all_data[$i]['2'];
    $alamat = $all_data[$i]['3'];
    $telp = $all_data[$i]['4'];
    $sql .= "('$uuid', '$no_id', '$nama', '$jk', '$alamat', '$telp'),";
  }
  $sql = substr($sql, 0, -1);
  // echo $sql;
  mysqli_query($con, $sql) or die (mysqli_error($con));
  unlink($target_file);
  echo"<script>window.location='data.php'</script>";
}

?>
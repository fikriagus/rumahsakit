<?php
require_once "../_config/config.php";

if(!isset ($_POST['checked'])){
  echo"<script>alert('Tidak Ada Data yang Dipilih'); window.location='data.php'</script>";
}
  else{
    $chk = $_POST['checked'];
    foreach($chk as $id){
      $sql = mysqli_query($con, "DELETE FROM tb_poliklinik WHERE id_poli= '$id'") or die (mysqli_error($con));
    }
    if($sql){
      echo"<script>alert('".count($chk)." Data Berhasil Dihapus'); window.location='data.php'</script>";
    }else{
      echo"<script>alert('Gagal Hapus Data, Coba Lagi');</script>";
    }
}
?>
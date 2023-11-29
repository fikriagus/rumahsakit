
<?php require_once "../_config/config.php"; ?>
<?php

if (isset($_POST['id_pasien'])) {
    $id_pasien = $_POST['id_pasien'];
    $query = "SELECT keluhan FROM tb_regis_pasien WHERE id_regis='$id_pasien'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        $keluhan = $data['keluhan'];
        echo $keluhan; // Return the keluhan data
    } else {
        echo ''; // Return empty string if no keluhan data found
    }
} else {
    echo ''; // Return empty string if no ID is provided
}
?>

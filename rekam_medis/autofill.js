$(document).ready(function () {
  $("#pasien").change(function () {
    var id_pasien = $(this).val();
    if (id_pasien) {
      $.ajax({
        url: "get_keluhan.php", // Replace with your actual AJAX endpoint URL
        method: "POST",
        data: { id_pasien: id_pasien },
        success: function (response) {
          $("#keluhan").val(response); // Set the keluhan input value with retrieved data
        },
      });
    } else {
      $("#keluhan").val(""); // Clear the keluhan input value if no patient is selected
    }
  });
});

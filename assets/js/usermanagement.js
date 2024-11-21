$(function () {
  // Tambah User
  $(".add-user").on("click", function () {
    $("#judulModalLabel").html("Tambah User");
    $(".modal-user button[type=submit]").html("Add User");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/tambah"
    );

    // Reset semua input di modal
    const data = "";
    $("#input-username").val(data);
    $("#input-password").val(data);
    $("#option-role").val("Pilih Role");
    $("#stambuk").val(data).parent().hide(); // Reset dan sembunyikan stambuk
    $("#id").val(data);
  });

  // Edit User
  $(".edit-user").on("click", function () {
    $("#judulModalLabel").html("Edit User");
    $(".modal-user button[type=submit]").html("Edit User");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/editUser"
    );

    const id = $(this).data("id");

    // Ambil data user melalui AJAX
    $.ajax({
      url: "http://localhost/SIPEMLA/Usermanagement/editTampil",
      data: { id: id },
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#input-username").val(data.username);
        $("#input-password").val(data.password);
        $("#option-role").val(data.role);
        $("#id").val(data.iduser);

        // Tampilkan atau sembunyikan stambuk berdasarkan role
        if (data.role === "Mahasiswa") {
          $("#stambuk").val(data.stambuk).parent().show(); // Tampilkan stambuk
        } else {
          $("#stambuk").val("").parent().hide(); // Sembunyikan stambuk
        }
      },
    });
  });

  // Tampilkan stambuk hanya untuk role Mahasiswa saat role diubah
  $("#option-role").on("change", function () {
    const role = $(this).val();
    if (role === "Mahasiswa") {
      $("#stambuk").parent().show(); // Tampilkan stambuk
    } else {
      $("#stambuk").val("").parent().hide(); // Sembunyikan stambuk
    }
  });
});

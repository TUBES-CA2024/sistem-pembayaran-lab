$(function () {
  // Tambah User
  $(".add-user").on("click", function () {
    $("#judulModalLabel").html("Tambah User");
    $(".modal-user button[type=submit]").html("Tambah User");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/tambah"
    );

    // Reset semua input di modal
    // const data = "";
    $("#input-username").val("");
    $("#input-password").val("");
    $("#option-role").val("Pilih Role");
    $("#stambuk").val("").parent().hide(); // Reset dan sembunyikan stambuk
    $("#id").val("");
  });

  // Edit User
  $(document).on('click', '.edit-user', function () {
    $("#judulModalLabel").html("Edit User");
    $(".modal-user button[type=submit]").html("Edit Data");
    // $("#judulModalbutton").html("Edit User");

    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/editUser"
    );

    const id = $(this).data("id");
    console.log("Editing User with ID:", id);

    // Ambil data user melalui AJAX
    $.ajax({
      url: "http://localhost/SIPEMLA/Usermanagement/editTampil",
      method: "POST",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // console.log(data)
        console.log("Data berhasil diterima dari server:", data);
        if (data) {
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

        } else {
          alert("Data tidak ditemukan");
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

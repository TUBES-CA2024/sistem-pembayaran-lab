$(function () {
  $(".add-user").on("click", function () {
    $("#judulModalLabel").html("Tambah User");
    $(".modal-user button[type=submit]").html("Add User");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/tambah"
    );
    const data = "";
    $("#input-username").val(data);
    $("#input-password").val(data);
    $("#option-role").val("Pilih Role");
    $("#id").val(data);
  });

  $(".edit-user").on("click", function () {
    $("#judulModalLabel").html("Edit User");
    $(".modal-user button[type=submit]").html("Edit User");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Usermanagement/editUser"
    );

    const id = $(this).data("id");

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
      },
    });
  });
});

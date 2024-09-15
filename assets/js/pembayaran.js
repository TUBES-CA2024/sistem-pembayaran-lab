$(function () {
  $(".add-pembayaran").on("click", function () {
    $("#judulModalLabel").html("Tambah Pembayaran");
    $(".modal-pembayaran button[type=submit]").html("Add Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Pembayaran/tambah"
    );
    const data = "";
    $("#input-stambuk").val(data);
    $("#input-waktupembayaran").val(data);
    $("#input-nominal").val(data);
    $("#input-status").val("Pilih Status");
  });

  $(".edit-pembayaran").on("click", function () {
    $("#judulModalLabel").html("Ubah Pembayaran");
    $(".modal-pembayaran button[type=submit]").html("Edit Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Pembayaran/editPembayaran"
    );

    const id = $(this).data("id");
    console.log(id);

    $.ajax({
      url: "http://localhost/SIPEMLA/Pembayaran/editTampil",
      data: { id: id },
      method: "POST",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#input-stambuk").val(data.stambuk);
        $("#input-waktupembayaran").val(data.waktupembayaran);
        $("#input-nominal").val(data.nominal);
        $("#input-status").val(data.status);
        $("#hidden-idpembayaran").val(data.idpembayaran);
      },
    });
  });
});

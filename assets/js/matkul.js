$(function () {
  $(".add-matkul").on("click", function () {
    $("#judulModalLabel").html("Tambah Mata Kuliah");
    $(".modal-matkul button[type=submit]").html("Add Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Matakuliah/tambah"
    );
    const data = "";
    $("#input-kodematkul").val(data);
    $("#input-matkul").val(data);
    $("#input-sks").val(data);
  });

  $(".edit-matkul").on("click", function () {
    $("#judulModalLabel").html("Edit Mata Kuliah");
    $(".modal-matkul button[type=submit]").html("Edit Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIPEMLA/Matakuliah/editMatkul"
    );

    const id = $(this).data("id");
    console.log(id);

    $.ajax({
      url: "http://localhost/SIPEMLA/Matakuliah/editTampil",
      data: { id: id },
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#input-kodematkul").val(data.kodematakuliah);
        $("#input-matkul").val(data.namamatakuliah);
        $("#input-sks").val(data.sks);
        $("#hidden-kodematkul").val(data.kodematakuliah);
      },
    });
  });
});

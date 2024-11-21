$(document).ready(function () {
  // Untuk Tambah Pembayaran
  $(".add-pembayaran").click(function () {
    $("#judulModalLabel").text("Tambah Pembayaran");
    $(".modal-footer button[type=submit]").text("Tambah");
    $("#formPembayaran form").attr("action", "<?= BASEURL; ?>/Pembayaran/tambah");

    // Kosongkan form
    $("#hidden-idpembayaran").val("");
    $("#stambuk").val("");
    $("#waktupembayaran").val(new Date().toISOString().split("T")[0]); // Default tanggal hari ini
    $(".form-check-input").prop("checked", false);
    $("#status").val("Belum Lunas");
  });

  // Untuk Edit Pembayaran
  $(".edit-pembayaran").click(function () {
    $("#judulModalLabel").text("Edit Pembayaran");
    $(".modal-footer button[type=submit]").text("Simpan Perubahan");
    $("#formPembayaran form").attr("action", "<?= BASEURL; ?>/Pembayaran/editPembayaran");

    const id = $(this).data("id");

    $.ajax({
      url: "<?= BASEURL; ?>/Pembayaran/editTampil",
      method: "POST",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        console.log("Data diterima:", data);
        if (data.error) {
          alert(data.error); // Tampilkan pesan error jika data tidak ditemukan
          return;
        }

        // Isi form dengan data dari server
        $("#hidden-idpembayaran").val(data.idpembayaran);
        $("#stambuk").val(data.stambuk);
        $("#waktupembayaran").val(data.waktupembayaran);
        $(".form-check-input").each(function () {
          $(this).prop("checked", data.kodematakuliah.includes($(this).val()));
        });
        $("#status").val(data.status);
      },
      error: function () {
        alert("Gagal mengambil data pembayaran. Silakan coba lagi.");
      },
    });
  });

  // Reset modal ketika ditutup
  $("#formPembayaran").on("hidden.bs.modal", function () {
    $("#judulModalLabel").text("");
    $(".modal-footer button[type=submit]").text("");
    $("#formPembayaran form").attr("action", "");
    $("#hidden-idpembayaran").val("");
    $("#stambuk").val("");
    $("#waktupembayaran").val("");
    $(".form-check-input").prop("checked", false);
    $("#status").val("");
  });
});


// $(function () {
//   $(".add-pembayaran").on("click", function () {
//     $("#judulModalLabel").html("Tambah Pembayaran");
//     $(".modal-pembayaran button[type=submit]").html("Add Data");
//     $(".modal-body form").attr(
//       "action",
//       "http://localhost/SIPEMLA/Pembayaran/tambah"
//     );
//     const data = "";
//     $("#input-stambuk").val(data);
//     $("#input-waktupembayaran").val(data);
//     $("#input-nominal").val(data);
//     $("#input-status").val("Pilih Status");
//   });

//   $(".edit-pembayaran").on("click", function () {
//     $("#judulModalLabel").html("Ubah Pembayaran");
//     $(".modal-pembayaran button[type=submit]").html("Edit Data");
//     $(".modal-body form").attr(
//       "action",
//       "http://localhost/SIPEMLA/Pembayaran/editPembayaran"
//     );

//     const id = $(this).data("id");
//     console.log(id);

//     $.ajax({
//       url: "http://localhost/SIPEMLA/Pembayaran/editTampil",
//       data: { id: id },
//       method: "POST",
//       dataType: "json",
//       success: function (data) {
//         console.log(data);
//         $("#input-stambuk").val(data.stambuk);
//         $("#input-waktupembayaran").val(data.waktupembayaran);
//         $("#input-nominal").val(data.nominal);
//         $("#input-status").val(data.status);
//         $("#hidden-idpembayaran").val(data.idpembayaran);
//       },
//     });
//   });
// });

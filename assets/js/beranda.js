$(function () {
  $(".priode1").on("click", function () {
    $(".col-4 form").attr(
      "action",
      "http://localhost/SIPEMLA/Beranda/printPriode1"
    );
  });

  $(".priode2").on("click", function () {
    $(".col-4 form").attr(
      "action",
      "http://localhost/SIPEMLA/Beranda/printPriode2"
    );
  });
});

$(document).ready(function () {
  // Event ketika isi input pencarian berubah
  $("#cariMahasiswa").on("input", function () {
    var keyword = $(this).val().toLowerCase();

    // Loop melalui setiap baris tabel
    $("tbody tr").each(function () {
      var rowText = $(this).text().toLowerCase();

      // Periksa apakah seluruh baris mengandung kata kunci
      if (rowText.includes(keyword)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // Event ketika checkbox "checkedAll" diubah
  $("#checkedAll").on("change", function () {
    $('input[type="checkbox"]').prop("checked", $(this).prop("checked"));
  });
});

$(document).ready(function () {
  // Initial sort order
  var sortOrder = "asc";

  // Function to sort the table
  function sortTable() {
    var rows = $("#tableBody tr").get();

    rows.sort(function (a, b) {
      var keyA = parseInt($(a).find("td:eq(0)").text());
      var keyB = parseInt($(b).find("td:eq(0)").text());

      if (sortOrder === "asc") {
        return keyA - keyB;
      } else {
        return keyB - keyA;
      }
    });

    $.each(rows, function (index, row) {
      $("#tableBody").append(row);
    });
  }

  // Event handler for select change
  $("select").change(function () {
    if ($(this).val() === "1") {
      sortOrder = "asc";
    } else {
      sortOrder = "desc";
    }
    sortTable();
  });
});

// new DataTable("#tablePrint", {
//   scrollX: true,
// });

$(document).ready(function () {
  var table = $("#tablePrint").DataTable({
    lengthChange: false,
    buttons: [
      { extend: "copy", text: "Copy" },
      { extend: "excel", text: "Excel" },
      { extend: "csv", text: "CSV" },
      { extend: "pdf", text: "PDF" },
      { extend: "colvis", text: "Column Visibility" },
    ],
    scrollX: true,
  });

  table.buttons().container().appendTo("#tablePrint_wrapper .col-md-6:eq(0)");
});

$(function () {
    // Event for adding Mata Kuliah
    $(".add-matkul").on("click", function () {
        // Change modal title and submit button text
        $("#judulModalLabel").html("Tambah Mata Kuliah");
        $(".modal-matkul button[type=submit]").html("Add Data");

        // Set action URL for adding 
        $(".modal-body form").attr(
            "action",
            "http://localhost/SIPEMLA/Matakuliah/tambah"
        );

        // Clear the input fields
        $("#input-kodematkul").val("");
        $("#input-matkul").val("");
        $("#input-sks").val("");
    });

    // Event for editing Mata Kuliah
    $(document).on('click', '.edit-matkul', function () {
        // Change modal title and submit button text
        $("#judulModalLabel").html("Edit Mata Kuliah");
        $(".modal-matkul button[type=submit]").html("Edit Data");

        // Set action URL for editing
        $(".modal-body form").attr(
            "action",
            "http://localhost/SIPEMLA/Matakuliah/editMatkul"
        );

        // Get the ID from data-id attribute
        const id = $(this).data("id");
        console.log("Editing Mata Kuliah with ID:", id);

        // AJAX request to get the data for the selected Mata Kuliah
        $.ajax({
            url: "http://localhost/SIPEMLA/Matakuliah/editTampil",  // Ensure this URL is correct
            method: "POST",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                console.log("Data berhasil diterima dari server:", data);
                if (data) {
                    // Populate input fields with the returned data
                    $("#input-kodematkul").val(data.kodematakuliah);
                    $("#input-matkul").val(data.namamatakuliah);
                    $("#input-sks").val(data.sks);

                    // If there's a hidden input for ID, set its value
                    $("#hidden-kodematkul").val(data.kodematakuliah);
                } else {
                    alert("Data not found.");
                }
            },
            error: function (xhr, status, error) {
                console.log("Error fetching data:", error);
                alert("Terjadi kesalahan saat mengambil data.");
            }
        });
    });
});

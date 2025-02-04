// Menunggu DOM siap
document.addEventListener('DOMContentLoaded', function () {
    // Delegasi event pada container tabel atau body
    document.querySelector('.container-user').addEventListener('click', function (event) {
        // Cek apakah elemen yang diklik adalah tombol dengan class 'add-pembayaran'
        if (event.target.closest('.add-pembayaran')) {
            // Ambil idtagihan dari data atribut tombol yang diklik
            const button = event.target.closest('.add-pembayaran');
            const idTagihan = button.getAttribute('data-idtagihan');
            const stambuk = button.getAttribute('data-stambuk');

            // const id = $(this).data("idtagihan");
            console.log("Tambah pembayaran with ID:", idTagihan);

            // Isi field idtagihan pada form modal dengan nilai idTagihan yang sesuai
            document.getElementById('idtagihan').value = idTagihan;
            document.getElementById('stambuk').value = stambuk; // Set stambuk di form modal
        }
    });

    // Menunggu DOM siap
    $(document).ready(function () {
        // Delegasi event untuk tombol edit
        $(document).on('click', '.btn-edit', function () {
            // Ambil data yang terkait dengan tombol yang diklik
            const idPembayaran = $(this).data('idpembayaran');
            const idTagihan = $(this).data('idtagihan');
            const stambuk = $(this).data('stambuk');
            const tanggalPembayaran = $(this).data('tanggalpembayaran');
            const jumlahPembayaran = $(this).data('jumlahpembayaran');
            const status = $(this).data('status');

            // Debugging: log untuk memastikan data yang diambil benar
            console.log({
                idPembayaran,
                idTagihan,
                stambuk,
                tanggalPembayaran,
                jumlahPembayaran,
                status
            });

            // Isi data pada form modal edit
            $('#editIdPembayaran').val(idPembayaran);
            $('#editIdTagihan').val(idTagihan);
            $('#editStambuk').val(stambuk);
            $('#editTanggalPembayaran').val(tanggalPembayaran);
            $('#editJumlahPembayaran').val(jumlahPembayaran);
            $('#editStatus').val(status);

            // Menampilkan modal edit
            const modal = new bootstrap.Modal($('#editPembayaran'));
            modal.show();

            // Event untuk menghapus backdrop dan modal saat modal tertutup
            $('#editPembayaran').on('hidden.bs.modal', function () {
                // Reset form saat modal ditutup
                $(this).find('form')[0].reset();
                // Pastikan backdrop dihapus jika ada
                $('.modal-backdrop').remove();
            });
        });
    });
});

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

    // Script untuk tombol edit
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function () {
            const idPembayaran = this.getAttribute('data-idpembayaran');
            const idTagihan = this.getAttribute('data-idtagihan');
            const stambuk = this.getAttribute('data-stambuk');
            const tanggalPembayaran = this.getAttribute('data-tanggalpembayaran');
            const jumlahPembayaran = this.getAttribute('data-jumlahpembayaran');
            const status = this.getAttribute('data-status');

            // Debugging: log to check if values are correct
            console.log({
                idPembayaran,
                idTagihan,
                stambuk,
                tanggalPembayaran,
                jumlahPembayaran,
                status
            });

            // Set modal values
            document.getElementById('editIdPembayaran').value = idPembayaran;
            document.getElementById('editIdTagihan').value = idTagihan;
            document.getElementById('editStambuk').value = stambuk;
            document.getElementById('editTanggalPembayaran').value = tanggalPembayaran;
            document.getElementById('editJumlahPembayaran').value = jumlahPembayaran;
            document.getElementById('editStatus').value = status;
        });
    });
});

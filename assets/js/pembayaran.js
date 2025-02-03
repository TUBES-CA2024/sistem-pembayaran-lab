// document.addEventListener('DOMContentLoaded', function () {
//     // Delegasi event pada container tabel atau body
//     document.querySelector('.container-user').addEventListener('click', function (event) {

//         // Cek apakah elemen yang diklik adalah tombol dengan class 'add-pembayaran'
//         if (event.target.closest('.add-pembayaran')) {
//             // Ambil idtagihan dari data atribut tombol yang diklik
//             const button = event.target.closest('.add-pembayaran');
//             const idTagihan = button.getAttribute('data-idtagihan');

//             // Cari elemen <tr> yang memiliki data-tagihan sesuai dengan idtagihan
//             const tagihanRow = button.closest('tr');
//             const tagihanData = JSON.parse(tagihanRow.getAttribute('data-tagihan'));

//             // Ambil stambuk dari tagihanData
//             const stambuk = tagihanData.stambuk;

//             // Isi field idtagihan dan stambuk pada form modal
//             document.getElementById('idtagihan').value = idTagihan;
//             document.getElementById('stambuk').value = stambuk; // Set stambuk di form modal
//         }
//     });
// });


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
});

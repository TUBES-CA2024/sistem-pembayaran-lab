<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/print.css">
<div class="container-fluid">
    <div class="container overflow-y-auto p-1" style="max-height: 99vh;">

        <div id="print-area" class="card border p-4">
            <div class="container2">

                <div class="box1">

                    <div class="img">
                        <img src="<?= BASEURL ?>/assets/img/iclabs-logo.png" alt="Logo" class="logo logo-cetak">
                    </div>

                    <div class="header-container">
                        <div class="kata">
                            <div class="header-text" style="margin-top: 0;">
                                <h4 class="text-center"><strong>LABORATORIUM TERPADU</strong></h4>
                                <h4 class="text-center"><strong>FAKULTAS ILMU KOMPUTER UMI</strong></h4>
                                <p class="text-center" style="margin-bottom: 0;">Email: fikom.iclabs@umi.ac.id</p>
                                <p class="text-center">Website: iclabs.fikom.umi.ac.id</p>
                                <h6 class="text-center"><strong>BUKTI PEMBAYARAN PRAKTIKUM</strong></h6>
                                <p class="text-center"><strong>Invoice No:</strong> LAB/<?= $data['semester'] ?>/<?= date('Y') ?>/043</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box2">
                    <hr>
                    <p><strong>Stambuk:</strong> <?= $data['stambuk'] ?></p>
                    <p><strong>Nama:</strong> <?= $data['nama'] ?></p>
                    <p><strong>Mata Kuliah:</strong> <?= $data['matakuliah'] ?></p>
                    <p><strong>Jumlah Bayar:</strong> Rp <?= number_format($data['jumlah_pembayaran'], 0, ',', '.') ?></p>
                    <p><strong>Terbilang:</strong> <?= ucwords(terbilang($data['jumlah_pembayaran'])) ?> Rupiah</p>
                    <hr>
                    <p style="text-align: right;">Makassar, <?= date('d-M-Y') ?></p>
                    <div style="text-align: right; margin-top: 50px;">
                        <p><strong><u>Fatimah A.R Tuasamu, S.Kom., MTA., MOS</u></strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="box3">
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary btn-sm" onclick="printPembayaran()"> Cetak</button>
            </div>

            <div class="d-flex justify-content-center mt-2">
                <a href="<?= BASEURL; ?>/Laporan" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>

    </div>
</div>


<?php
setlocale(LC_TIME, 'id_ID.utf8');
function terbilang($angka)
{
    $angka = abs($angka);
    $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($angka < 12) {
        return $bilangan[$angka];
    } elseif ($angka < 20) {
        return terbilang($angka - 10) . " Belas";
    } elseif ($angka < 100) {
        return terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
    } elseif ($angka < 200) {
        return "Seratus " . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        return terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        return "Seribu " . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        return terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        return terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
    }
}
?>

<script>
    function printPembayaran() {
        const printArea = document.getElementById('print-area').outerHTML;
        const originalContent = document.body.innerHTML;
        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;
        location.reload();
    }
</script>
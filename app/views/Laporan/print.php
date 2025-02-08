<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/print.css">
<div class="container-fluid">
    <div class="overflow-y-auto p-1" style="max-height: 99vh;">

        <div id="print-area" class="border p-4" style="width: 7.6cm; height: 13cm; margin: auto; font-family: Arial, sans-serif; border: 1px solid black;">
            <div style="display: flex; align-items: center;">
                <img src="<?= BASEURL ?>/assets/img/iclabs-logo.png" width="50px" alt="Logo" style="margin-right: 10px;">
                <div style="text-align: left;">
                    <h4 style="margin: 0; font-size: 10px;"><strong>LABORATORIUM TERPADU</strong></h4>
                    <p style="margin: 0; font-size: 10px;"><strong>FAKULTAS ILMU KOMPUTER UMI</strong></p>
                    <p style="margin: 0; font-size: 9px;">Email: fikom.iclabs@umi.ac.id</p>
                    <p style="margin: 0; font-size: 9px;">Website: iclabs.fikom.umi.ac.id</p>
                </div>
            </div>
            <h5 class="text-center" style="font-size: 9px; margin-top: 10px;"><strong>BUKTI PEMBAYARAN PRAKTIKUM</strong></h5>
            <p class="text-center" style="font-size: 9px; margin: 0;"><strong>Invoice No:</strong> LAB/<?= $data['semester'] ?>/<?= date('Y') ?>/043</p>
            <hr>
            <p style="font-size: 10px;"><strong>Stambuk:</strong> <?= $data['stambuk'] ?></p>
            <p style="font-size: 10px;"><strong>Nama:</strong> <?= $data['nama'] ?></p>
            <p style="font-size: 10px;"><strong>Mata Kuliah:</strong> <?= $data['matakuliah'] ?></p>
            <p style="font-size: 10px;"><strong>Jumlah Bayar:</strong> Rp <?= number_format($data['jumlah_pembayaran'], 0, ',', '.') ?></p>
            <p style="font-size: 10px;"><strong>Terbilang:</strong> <?= ucwords(terbilang($data['jumlah_pembayaran'])) ?> Rupiah</p>
            <hr>
            <?php
            setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'Indonesian_indonesia.1252');
            ?>
            <p style="text-align: right; font-size: 10px;">Makassar, <?= date('d-M-Y') ?></p>
            <div style="text-align: right; margin-top: 50px;">
                <p style="font-size: 10px;"><strong><u>Fatimah A.R Tuasamu, S.Kom., MTA., MOS</u></strong></p>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-primary btn-sm" onclick="printPembayaran()"> Cetak</button>
        </div>

        <div class="d-flex justify-content-center mt-2">
            <a href="<?= BASEURL; ?>/Laporan" class="btn btn-danger btn-sm">Kembali</a>
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
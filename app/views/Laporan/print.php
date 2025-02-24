<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/print.css">
<div class="container">
    <div id="print-area" class="invoice-box" style="padding: 10px;">

        <header class="d-flex justify-content-between align-items-center">
            <div class="img">
                <img src="<?= BASEURL ?>/assets/img/iclabs-logo.png" alt="Logo" class="logo logo-cetak" style="width: 100%;">
            </div>

            <div class="logo">
                <h2>LABORATORIUM TERPADU</h2>
                <h2>FAKULTAS ILMU KOMPUTER UMI</h2>
                <h6>Email: fikom.iclabs@umi.ac.id</h6>
                <h6>Website: iclabs.fikom.umi.ac.id</h6>
            </div>
        </header>

        <div class="text-center" style="margin-top: 20px;">
            <?php
            $inv = 1;
            $invWithLeadingZeros = str_pad($inv, 3, '0', STR_PAD_LEFT);
            // $inv++;
            ?>
            <h4>BUKTI PEMBAYARAN PRAKTIKUM</h4>
            <h4>Invoice No. LAB/<?= $data['semester'] ?>/<?= date('Y') ?>/<?= $invWithLeadingZeros ?></h4>
        </div>
        <hr style="border: 2px solid #000000; margin-left: 50px; margin-right: 50px;">

        <div style="margin-top: 30px; margin-left: 80px; margin-right: 50px; margin-bottom: 10px;">
            <div class="d-flex justify-content-start mb-3">
                <div>Stambuk</div>
                <div style="margin-left: 63px;">:</div>
                <div style="margin-left: 70px;"><?= $data['stambuk'] ?></div>
            </div>
            <div class="d-flex justify-content-start mb-3">
                <div>Nama</div>
                <div style="margin-left: 84px;">:</div>
                <div style="margin-left: 70px;"><?= $data['nama'] ?></div>
            </div>
            <div class="d-flex justify-content-start mb-3">
                <div>Mata Kuliah</div>
                <div style="margin-left: 40px;">:</div>
                <div style="margin-left: 70px;"><?= $data['matakuliah'] ?></div>
            </div>

        </div>

        <div style="margin-top: 40px; margin-left: 70px; margin-right: 50px; margin-bottom: 10px;">
            <div class="d-flex justify-content-start">
                <div>Jumlah Bayar</div>
                <div style="margin-left: 35px;">: </div>
                <div class="mb-3" style="margin-left: 70px;">Rp. <?= number_format($data['jumlah_pembayaran'], 0, ',', '.') ?></div>
            </div>
            <i><?= ucwords(terbilang($data['jumlah_pembayaran'])) ?> Rupiah</i>
        </div>
        <hr style="border: 2px solid #000000; margin-left: 50px; margin-right: 50px; margin-top: 30px">
        <p style="text-align: right; margin-right: 50px; margin-top: 60px;">Makassar, <?= date('d-M-Y') ?></p>
        <div style="text-align: right; margin-top: 10px;">
            <img src="<?= BASEURL ?>/assets/img/ttd.jpg" alt="Tanda Tangan" style="width: 180px; height:auto; margin-bottom: 10px; margin-right: 50px;">
            <p><u>Fatimah A.R Tuasamu, S.Kom., MTA., MOS</u></p>
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
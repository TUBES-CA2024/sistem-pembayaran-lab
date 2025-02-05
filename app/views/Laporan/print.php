<div class="container-fluid">
    <div class="overflow-y-auto p-1" style="max-height: 99vh;">
        <div id="print-area">
            <div class="container">
                <div class="header">
                    <img src="<?= BASEURL ?>/assets/img/logo-umi.png" width="50px" alt="Logo">
                    <h3>LABORATORIUM TERPADU</h3>
                    <p>FAKULTAS ILMU KOMPUTER UMI</p>
                    <p>Email: fikom.iclabs@umi.ac.id</p>
                    <p>Website: iclabs.fikom.umi.ac.id</p>
                </div>

                <div class="content">
                    <p><strong>BUKTI PEMBAYARAN PRAKTIKUM</strong></p>
                    <p><strong>Invoice No:</strong> LAB/GANJIL/2024/043</p>
                    <p><strong>Stambuk:</strong> <?= $data['stambuk'] ?></p>
                    <p><strong>Nama:</strong> <?= $data['nama'] ?></p>
                    <p><strong>Mata Kuliah:</strong> <?= $data['matakuliah'] ?></p>
                    <p><strong>Jumlah Bayar:</strong> Rp <?= number_format($data['jumlah_pembayaran'], 0, ',', '.') ?></p>
                </div>

                <div class="footer">
                    <p>Makassar, <?= date('d-m-Y') ?></p>
                    <div class="signature">
                        <p>Fatimah A.R Tuasamu, S.Kom., MTA., MOS</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-primary" onclick="printPembayaran()"> Cetak Riwayat Pembayaran</button>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <a
                href="<?= BASEURL; ?>/Laporan"
                type="button"
                class="btn btn-danger"
                role="button">Back
            </a>
        </div>
    </div>

    <script>
        function printPembayaran() {
            const printArea = document.getElementById('print-area');
            const originalContent = document.body.innerHTML;
            document.body.innerHTML = printArea.outerHTML;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
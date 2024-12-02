<div class="container mt-5">
    <h1 class="text-center">Riwayat Pembayaran</h1>
    <div id="print-area">
        <h5 class="mt-4"><strong>Stambuk:</strong> <?= $_SESSION['stambuk']; ?></h5>
        <h5><strong>Nama: </strong><?= $data['nama'] ?></h5>
        <h5><strong>Program Studi</strong>: <?= $data['prodi'] ?? ''; ?></h5>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalNominal = 0;
                $no = 1;
                foreach ($data['pembayaran'] as $pmb) :
                    $totalNominal += $pmb['nominal'];
                    $formattedDate = ($pmb['waktupembayaran'] !== '0000-00-00' && $pmb['waktupembayaran'] !== '')
                        ? date('d-m-Y', strtotime($pmb['waktupembayaran']))
                        : '-';
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <!-- <td><?= $pmb['matkul'] ?? '-'; ?></td> -->
                        <td><?= $formattedDate; ?></td>
                        <td>Rp. <?= number_format($pmb['nominal'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong>Rp. <?= number_format($totalNominal, 2, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-3">
        <button class="btn btn-primary" onclick="printPembayaran()">Cetak Riwayat Pembayaran</button>
    </div>
    <div>
        <a href="<?= BASEURL; ?>/Pembayaranmh" type="button" class="btn btn-danger me-3 mt-5" role="button">Back</a>
    </div>
</div>

<script>
    function printPembayaran() {
        const printArea = document.getElementById('print-area');
        const originalContent = document.body.innerHTML;

        // Menampilkan area print (menyembunyikan elemen lain)
        document.body.innerHTML = printArea.outerHTML;

        // Mencetak halaman
        window.print();

        // Mengembalikan konten asli setelah print selesai
        document.body.innerHTML = originalContent;

        // Memuat ulang halaman untuk memperbaiki tampilan
        location.reload();
    }
</script>
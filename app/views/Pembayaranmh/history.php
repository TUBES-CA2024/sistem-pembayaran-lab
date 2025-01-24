<div class="container-fluid">
    <div class="overflow-y-auto p-1" style="max-height: 99vh;">


        <div id="print-area">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img
                        src=" <?= BASEURL ?>/assets/img/logo-umi.png"
                        alt="foto-card4"
                        width="90px">
                </div>
                <div class="col">
                    <h6 class="text-center"><strong> UNIVERSITAS MUSLIM INDONESIA</strong></h6>
                    <h6 class="text-center"><strong>FAKULTAS ILMU KOMPUTER</strong></h6>
                    <h6 class="text-center">REKTORAT: Jl. Urip Sumoharjo KM. 5 Makassar 90231</h6>
                    <h6 class="text-center"><strong>PEMBAYARAN</strong></h6>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <h7 class="mt-4">Nama : <?= $data['nama'] ?></h7>
                <h7 class="mt-4">Program Studi : <?= $data['prodi'] ?? ''; ?></h7>
                <h7 class="mt-4">Stambuk : <?= $_SESSION['stambuk']; ?></h7>
            </div>


            <table class="table table-bordered mt-2 border-dark">
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Pembayaran</th>
                        <th class="text-center">Nominal</th>
                    </tr>
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
                            <td><?= $formattedDate; ?></td>
                            <td>Rp. <?= number_format($pmb['nominal'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2" class="text-center"><strong>Total</strong></td>
                        <td><strong>Rp. <?= number_format($totalNominal, 2, ',', '.'); ?></strong></td>
                    </tr>

                </tbody>
            </table>
            <div class="card border-dark p-3">
                <h6 class="mb-5"> Catatan Penasehat Akademik :</h6>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <h6>Makassar, <?= date('d'); ?> <?= date('M'); ?> <?= date('Y'); ?></h6>
            </div>
            <div class="d-flex justify-content-between">
                <h7 class="mt-2">Ketua Program Studi,</h7>
                <h7 class="mt-2">Penasehat Akademik,</h7>
                <h7 class="mt-2">Mahasiswa,</h7>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <h7 class="text-center mt-4"><Strong>Tasrif Hasanuddin, ST.,M.Cs</Strong> <br> 0910126901</h7>
                <h7 class="mt-4"><strong>Penasehat Akademik</strong> </h7>
                <h7 class="text-center mt-4"><strong><?= $data['nama'] ?></strong> <br>NPM. <?= $_SESSION['stambuk']; ?></h7>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">

            <button class="btn btn-primary" onclick="printPembayaran()"> Cetak Riwayat Pembayaran</button>

        </div>
        <div class="d-flex justify-content-center mt-3">
            <a
                href="<?= BASEURL; ?>/Pembayaranmh"
                type="button"
                class="btn btn-danger"
                role="button">Back
            </a>
        </div>

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
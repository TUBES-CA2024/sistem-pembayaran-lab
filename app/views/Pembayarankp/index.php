<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayarankp.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img
                    src="<?= BASEURL ?>/assets/img/pembayaran.png"
                    alt="foto-card4"
                    width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Pembayaran</h5>
                <h2 class="card-subtitle mb-2"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2>
                <p class="card-text">Jumlah Pembayaran</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">STAMBUK</th>
                        <th class="text-center">NAMA MAHASISWA</th>
                        <th class="text-center">ANGKATAN</th>
                        <th class="text-center">SEMESTER</th>
                        <th class="text-center">MATAKULIAH</th>
                        <th class="text-center">TANGGAL BAYAR</th>
                        <th class="text-center">JUMLAH TAGIHAN</th>
                        <th class="text-center">JUMLAH BAYAR</th>
                        <th class="text-center">SISA BAYAR</th>
                        <th class="text-center">KET</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['pembayaran'] as $index => $pmb):

                        $jumlahTagihan = $pmb['jumlah_tagihan'];
                        $jumlahBayar = $pmb['jumlah_pembayaran'];
                        $sisaBayar = $jumlahTagihan - $jumlahBayar; // Hitung sisa bayar

                    ?>

                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $pmb['stambuk']; ?></td>
                            <td><?= $pmb['nama']; ?></td>
                            <td><?= $pmb['angkatan']; ?></td>
                            <td><?= $pmb['semester']; ?></td>
                            <td><?= $pmb['matakuliah']; ?></td>
                            <td><?= $pmb['tanggal_pembayaran']; ?></td>
                            <td class="text-center">Rp. <?= number_format($pmb['jumlah_tagihan'], 0, ',', '.') ?></td>
                            <td class="text-center">Rp. <?= number_format($pmb['jumlah_pembayaran'], 0, ',', '.')  ?></td>
                            <td class="text-center">Rp. <?= number_format($sisaBayar, 0, ',', '.') ?></td>
                            <td><?= $pmb['status']; ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
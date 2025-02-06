<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
        <div class="row">
            <div class="col-lg-6">
                <?php PesanFlash::flash(); ?>
            </div>
        </div>

        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 860px;">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="6">Tagihan</th>
                        <th>
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="tahun-akademik">Tahun Akademik</label>
                                    <select id="tahun-akademik" class="form-select">
                                        <?php foreach ($data['tagihan'] as $index => $pmb): ?>
                                            <option><?= $pmb['tahun_akademik']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <!-- <div class="col-auto">
                        <form action="<?= BASEURL; ?>/Pembayaranmh/registrasi" method="POST" class="mt-4">
                            <button class="btn btn-success opacity-75" type="submit"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Register Mahasiswa</button>
                        </form>
                    </div> -->
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Jumlah Tagihan</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Tahun Akademik</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Matkul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inv = 0;
                    if (!empty($data['tagihan'])) {
                        foreach ($data['tagihan'] as $index => $pmb):
                            if ($pmb['stambuk'] == $_SESSION['stambuk']) {
                                $inv++;
                    ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $pmb['stambuk']; ?></td>
                                    <td>Rp. <?= $pmb['jumlah_tagihan']; ?></td>
                                    <td><?= $pmb['angkatan']; ?></td>
                                    <td><?= $pmb['tahun_akademik']; ?></td>
                                    <td><?= $pmb['semester']; ?></td>
                                    <td><?= $pmb['matakuliah']; ?></td>
                                </tr>
                    <?php
                            }
                        endforeach;
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="overflow-x-auto rounded-4 shadow-lg p-4 mt-5" style="min-width: 860px;">
            <h4>History Pembayaran</h4>
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Matkul</th>
                        <th class="text-center">Tanggal Bayar</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inv = 0;
                    if (!empty($data['tagihan'])) {
                        foreach ($data['tagihan'] as $index => $pmb):
                            if ($pmb['stambuk'] == $_SESSION['stambuk']) {
                                $inv++;
                    ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $pmb['stambuk']; ?></td>
                                    <td><?= $pmb['matakuliah']; ?></td>
                                    <td><?= $pmb['tanggal_pembayaran']; ?></td>
                                    <td>Rp. <?= $pmb['jumlah_pembayaran']; ?></td>
                                    <td><?= $pmb['status']; ?></td>
                                </tr>
                    <?php
                            }
                        endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div class="text-center mt-3">
    <form action="<?= BASEURL; ?>/Pembayaranmh/history" method="POST">
        <button class="btn btn-info me-2 text-white" type="submit"><i class="fa-solid fa-print"></i> Cetak Pembayaran</button>
    </form>
</div> -->
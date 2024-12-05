<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 860px;">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="5">Semester Regular</th>
                        <th colspan="2">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="tahun-akademik">Tahun Akademik</label>
                                    <select id="tahun-akademik" class="form-select">
                                        <option>2024/2025</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <form action="<?= BASEURL; ?>/Pembayaranmh/registrasi" method="POST" class="mt-4">
                                        <button class="btn btn-success opacity-75" type="submit"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Register Mahasiswa</button>
                                    </form>
                                </div>

                            </div>
                        </th>
                    </tr>

                    <tr>
                        <th>No</th>
                        <th>Stambuk</th>
                        <th>Nama</th>
                        <th>Waktu Pembayaran</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['pembayaran'])) {
                        $no = 1;
                        foreach ($data['pembayaran'] as $pmb) :
                            if ($pmb['stambuk'] == $_SESSION['stambuk']) {
                                $waktuPembayaran = $pmb['waktupembayaran'];

                                $formattedDate = ($waktuPembayaran != '0000-00-00' && $waktuPembayaran != '')
                                    ? date('d-m-Y', strtotime($waktuPembayaran))
                                    : '-';

                                $formattedNominal = number_format($pmb['nominal'], 0, ',', '.');
                    ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pmb['stambuk']; ?></td>
                                    <td><?= $pmb['nama']; ?></td>
                                    <td><?= $formattedDate; ?></td>
                                    <td>Rp. <?= $formattedNominal; ?></td>
                                    <td>
                                        <span class="<?= $pmb['status'] == 'Lunas' ? 'badge bg-success' : 'badge bg-danger'; ?>">
                                            <?= $pmb['status']; ?>
                                        </span>
                                    </td>

                                </tr>
                    <?php
                            }
                        endforeach;
                    } else {
                        echo '<tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="overflow-x-auto rounded-4 shadow-lg p-4 mt-5" style="min-width: 860px;">
            <h4>History Pembayaran</h4>
            <table class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tagihan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['history'])): ?>
                        <?php
                        $no = 1;
                        foreach ($data['history'] as $history):
                            $formattedDate = date('d-m-Y', strtotime($history['tanggal']));
                            $formattedTagihan = number_format($history['tagihan'], 0, ',', '.');
                            $matkul = $history['matkul'] ?? 'Tidak diketahui';
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $formattedDate; ?></td>
                                <td>Rp. <?= $formattedTagihan; ?></td>
                                <td>
                                    <span class="<?= $history['status'] == 'Lunas' ? 'badge bg-success' : 'badge bg-danger'; ?>">
                                        <?= $history['status']; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada history pembayaran</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center mt-3">
    <form action="<?= BASEURL; ?>/Pembayaranmh/history" method="POST">
        <button class="btn btn-info me-2 text-white" type="submit"><i class="fa-solid fa-print"></i> Cetak Pembayaran</button>
    </form>
</div>
<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <!-- Table for Semester Regular and Tahun Akademik -->
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
                                        <button class="btn btn-success opacity-75" type="submit">
                                            <img src="<?= BASEURL ?>/assets/img/add.png" alt="">Register Mahasiswa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Stambuk</th>
                        <th>Nama</th>
                        <th>Kode Matakuliah</th>
                        <th>Waktu Pembayaran</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['pembayaran'] as $pmb) :
                        $no++;
                        $waktuPembayaran = $pmb['waktupembayaran'];

                        if ($waktuPembayaran != '0000-00-00' && $waktuPembayaran != '') {
                            $formattedDate = date('d-m-Y', strtotime($waktuPembayaran));
                        } else {
                            $formattedDate = '-';
                        }
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $pmb['stambuk']; ?></td>
                            <td><?= $pmb['nama']; ?></td>
                            <td><?= $pmb['kodematakuliah']; ?></td>
                            <td><?= $formattedDate; ?></td>
                            <td>Rp. <?= number_format($pmb['nominal'], 2, ',', '.'); ?></td>
                            <td>
                                <?php if ($pmb['status'] === 'Lunas') : ?>
                                    <button class="btn btn-success">Lunas</button>
                                <?php else : ?>
                                    <button class="btn btn-danger">Belum Lunas</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- History Pembayaran Table -->
        <div class="overflow-x-auto rounded-4 shadow-lg p-4 mt-5" style="min-width: 860px;">
            <h4>History Pembayaran</h4>
            <table class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data dari tabel history_pembayaran
                    $historyData = $this->model('Pembayaran_model')->getHistoryPembayaran(); // Pastikan model ini ada
                    $no = 1;

                    foreach ($historyData as $history) :
                        $formattedDate = date('d-m-Y', strtotime($history['tanggal_pembayaran']));
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $formattedDate; ?></td>
                            <td>Rp. <?= number_format($history['nominal'], 2, ',', '.'); ?></td>
                            <td>
                                <?php if ($history['status'] === 'Lunas') : ?>
                                    <button class="btn btn-success">Lunas</button>
                                <?php else : ?>
                                    <button class="btn btn-danger">Belum Lunas</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-primary" onclick="printPembayaran()">Cetak Pembayaran</button>
        </div>
        <div id="print-area" style="display: none;">
            <h2 class="text-center">Data Pembayaran Laboratorium Tahun Akademik 2024/2025</h2>
            <p><strong>Stambuk</strong>: <?= $data['pembayaran'][0]['stambuk'] ?? ''; ?></p>
            <p><strong>Nama</strong>: <?= $data['pembayaran'][0]['nama'] ?? ''; ?></p>
            <p><strong>Program Studi</strong>: <?= $data['pembayaran'][0]['program_studi'] ?? 'Program Studi Tidak Tersedia'; ?></p>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Matakuliah</th>
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
                            <td><?= $pmb['matakuliah'] ?? 'Tidak Tersedia'; ?></td>
                            <td><?= $formattedDate; ?></td>
                            <td>Rp. <?= number_format($pmb['nominal'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>Rp. <?= number_format($totalNominal, 2, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function printPembayaran() {
        const printArea = document.getElementById('print-area');
        const originalContent = document.body.innerHTML;

        printArea.style.display = 'block';
        document.body.innerHTML = printArea.outerHTML;

        window.print();
        document.body.innerHTML = originalContent;
        location.reload();
    }
</script>

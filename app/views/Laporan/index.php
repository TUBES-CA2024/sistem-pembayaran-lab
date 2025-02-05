<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">
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
                <h5 class="card-title">Tagihan</h5>
                <!-- <h2 class="card-subtitle mb-2"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2> -->
                <p class="card-text">Jumlah Tagihan</p>
            </div>
        </div>
    </div>
</div>

<!-- Button Filter Laporan -->
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 75vh;">
        <div class="row">
            <div class="col-lg-6">
                <?php PesanFlash::flash(); ?>
            </div>
        </div>
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 860px;">
            <div class="col-md-11 card-body">
                <!-- Button untuk membuka modal filter laporan -->
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formLaporan">Filter Laporan</button>
            </div>
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Matakuliah</th>
                        <th class="text-center">Tanggal Bayar</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data laporan setelah filter diterapkan
                    if (isset($data['laporan'])) {
                        foreach ($data['laporan'] as $index => $pmb):
                    ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td class="text-center"><?= $pmb['stambuk'] ?></td>
                                <td class="text-center"><?= $pmb['nama'] ?></td>
                                <td class="text-center"><?= $pmb['matakuliah'] ?></td>
                                <td class="text-center"><?= $pmb['tanggal_pembayaran'] ?></td>
                                <td class="text-center"><?= $pmb['jumlah_pembayaran'] ?></td>
                                <td class="text-center"><?= $pmb['status'] ?></td>
                                <td class="text-center">
                                    <!-- Form cetak untuk setiap mahasiswa -->
                                    <form action="<?= BASEURL; ?>/Laporan/print" method="POST">
                                        <input type="hidden" name="stambuk" value="<?= $pmb['stambuk']; ?>">
                                        <input type="hidden" name="nama" value="<?= $pmb['nama']; ?>">
                                        <input type="hidden" name="matakuliah" value="<?= $pmb['matakuliah']; ?>">
                                        <input type="hidden" name="tanggal_pembayaran" value="<?= $pmb['tanggal_pembayaran']; ?>">
                                        <input type="hidden" name="jumlah_pembayaran" value="<?= $pmb['jumlah_pembayaran']; ?>">
                                        <input type="hidden" name="status" value="<?= $pmb['status']; ?>">
                                        <button class="btn btn-info text-white" type="submit">
                                            <i class="fa-solid fa-print"></i> Cetak
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal Filter Laporan -->
<div class="modal fade" id="formLaporan" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Filter Laporan Harian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk filter laporan -->
                <form method="POST" action="<?= BASEURL ?>/Laporan/filter" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Awal</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
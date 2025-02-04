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
                <h5 class="card-title">Pembayaran</h5>
                <h2 class="card-subtitle mb-2"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2>
                <p class="card-text">Jumlah Pembayaran</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 75vh;">
        <div class="row">
            <div class="col-lg-6">
                <?php PesanFlash::flash(); ?>
            </div>
        </div>
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 860px;">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Jumlah Tagihan</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Tahun Akademik</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Matkul</th>
                        <th class="text-center">Tanggal Bayar</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['tagihan'] as $index => $pmb): ?>
                        <?php
                        // Cari pembayaran yang sesuai dengan idtagihan saat ini
                        $pembayaran_terkait = array_filter($data['pembayaran'], function ($pembayaran) use ($pmb) {
                            return $pembayaran['idtagihan'] == $pmb['idtagihan'];
                        });

                        // Jika tidak ada pembayaran terkait, buat array kosong
                        if (empty($pembayaran_terkait)) {
                            $pembayaran_terkait = [[
                                'tanggal_pembayaran' => '-',
                                'jumlah_pembayaran' => '-',
                                'status' => 'Belum Bayar'
                            ]];
                        }
                        ?>
                        <?php foreach ($pembayaran_terkait as $pembayaran): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td class="text-center"><?= $pmb['stambuk'] ?></td>
                                <td class="text-center"><?= $pmb['jumlah_tagihan'] ?></td>
                                <td class="text-center"><?= $pmb['angkatan'] ?></td>
                                <td class="text-center"><?= $pmb['tahun_akademik'] ?></td>
                                <td class="text-center"><?= $pmb['semester'] ?></td>
                                <td class="text-center"><?= $pmb['matakuliah'] ?></td>
                                <td class="text-center"><?= $pembayaran['tanggal_pembayaran'] ?></td>
                                <td class="text-center"><?= $pembayaran['jumlah_pembayaran'] ?></td>
                                <td class="text-center"><?= $pembayaran['status'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- Tombol Tambah Pembayaran (Menambahkan kondisi jika sudah ada pembayaran) -->
                                        <?php if (empty($pembayaran_terkait && $pembayaran['status'] != 'Belum Bayar')): ?>
                                            <button
                                                class="btn btn-success add-pembayaran me-2"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#formPembayaran"
                                                data-idtagihan="<?= $pmb['idtagihan'] ?>"
                                                data-stambuk="<?= $pmb['stambuk'] ?>">
                                                <img
                                                    src="<?= BASEURL ?>/assets/img/add.png"
                                                    alt="icon-edit">
                                            </button>
                                        <?php else: ?>
                                            <!-- Tombol Tambah Pembayaran dinonaktifkan jika sudah ada pembayaran -->
                                            <button
                                                class="btn btn-warning add-pembayaran me-2"
                                                type="button"
                                                disabled>
                                                <img src="<?= BASEURL ?>/assets/img/add.png" alt="icon-add">
                                            </button>
                                        <?php endif; ?>

                                        <!-- Cek jika ada pembayaran, jika tidak maka tombol edit dinonaktifkan -->
                                        <?php if (!empty($pembayaran_terkait) && $pembayaran['status'] != 'Belum Bayar'): ?>
                                            <button
                                                class="btn btn-success btn-edit me-2"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editPembayaran"
                                                data-stambuk="<?= $pmb['stambuk'] ?>"
                                                data-idtagihan="<?= $pmb['idtagihan'] ?>"
                                                data-idpembayaran="<?= $pembayaran['idpembayaran'] ?>"
                                                data-tanggalpembayaran="<?= $pembayaran['tanggal_pembayaran'] ?>"
                                                data-jumlahpembayaran="<?= $pembayaran['jumlah_pembayaran'] ?>"
                                                data-status="<?= $pembayaran['status'] ?>">
                                                <img src="<?= BASEURL ?>/assets/img/edit.png" alt="icon-edit">
                                            </button>
                                        <?php else: ?>
                                            <button
                                                class="btn btn-warning btn-edit me-2"
                                                type="button"
                                                disabled>
                                                <img src="<?= BASEURL ?>/assets/img/edit.png" alt="icon-edit">
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="formPembayaran" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/Pembayaran/tambah" method="POST">
                    <input type="hidden" id="idpembayaran" name="idpembayaran">
                    <input type="hidden" id="idtagihan" name="idtagihan">
                    <div class="mb-3">
                        <label for="stambuk" class="form-label">Stambuk</label>
                        <input type="text" class="form-control" id="stambuk" name="stambuk" value="<?= isset($data['stambuk']) ? $data['stambuk'] : '' ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pembayaran" class="form-label">Waktu Pembayaran</label>
                        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_pembayaran" class="form-label">Nominal</label>
                        <input type="text" id="jumlah_pembayaran" class="form-control" name="jumlah_pembayaran" placeholder="Masukkan Jumlah Bayar" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option selected disabled="Pilih Status">Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pembayaran-->
<div class="modal fade" id="editPembayaran" tabindex="-1" aria-labelledby="editPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPembayaranLabel">Edit Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Pembayaran/edit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="editIdPembayaran" name="idpembayaran">
                    <input type="hidden" id="editIdTagihan" name="idtagihan">
                    <div class="mb-3">
                        <label for="editStambuk" class="form-label">Stambuk</label>
                        <input type="text" class="form-control" id="editStambuk" name="stambuk" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editTanggalPembayaran" class="form-label">Waktu Pembayaran</label>
                        <input type="date" class="form-control" id="editTanggalPembayaran" name="tanggal_pembayaran" required>
                    </div>

                    <div class="mb-3">
                        <label for="editJumlahPembayaran" class="form-label">Nominal</label>
                        <input type="text" id="editJumlahPembayaran" class="form-control" name="jumlah_pembayaran" placeholder="Masukkan Jumlah Bayar" required>
                    </div>

                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status" required>
                            <option selected disabled>Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
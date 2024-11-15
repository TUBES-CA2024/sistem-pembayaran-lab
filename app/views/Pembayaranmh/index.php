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
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-danger">Tambah Matakuliah</button>
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
                        <th>Action</th>
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
                            <td><?= $formattedDate; ?></td>
                            <td>Rp. <?= $pmb['nominal']; ?></td>
                            <td><?= $pmb['status']; ?></td>
                            <td>
                                <a class="btn-edit edit-pembayaran" role="button" href="<?= BASEURL; ?>/Pembayaran/editTampil/<?= $pmb['idpembayaran'] ?>" data-bs-toggle="modal" data-bs-target="#formPembayaran" data-id="<?= $pmb['idpembayaran']; ?>">
                                    <img src="<?= BASEURL ?>/assets/img/edit.png" alt="icon-edit">
                                </a>
                                <button class="btn-delete" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $pmb['idpembayaran']; ?>">
                                    <img src="<?= BASEURL ?>/assets/img/delete.png" alt="icon-delete">
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $pmb['idpembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="w-100">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Hapus Data</h1>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-center">Anda Yakin Ingin Hapus Data ini?</h6>
                                    </div>
                                    <div class="modal-footer align-self-center border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                        <a href="<?= BASEURL; ?>/Pembayaran/hapus/<?= $pmb['idpembayaran'] ?>" role="button" class="btn btn-primary">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <th>Tanggal</th>
                        <th>Tagihan</th>
                        <th>Virtual Account</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Sample data for demonstration purposes.
                    // Replace this with your dynamic data fetching logic.
                    $historyData = [
                        
                    ];

                    $no = 1;
                    foreach ($historyData as $history) :
                        $formattedDate = date('d-m-Y', strtotime($history['tanggal']));
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $formattedDate; ?></td>
                            <td><?= $history['tagihan']; ?></td>
                            <td><?= $history['virtual_account']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

      
        <div class="text-center mt-3">
            <button class="btn btn-primary" onclick="window.print()">Cetak Pembayaran</button>
        </div>

    </div>
</div>

<!-- Modal Edit Tambah-->
<div class="modal fade" id="formPembayaran" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Pembayaran/tambah" method="post">
                    <input type="hidden" id="hidden-idpembayaran" name="idpembayaran">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">
                    <div class="mb-3">
                        <label for="kode-stambuk" class="form-label">Stambuk</label>
                        <input type="number" class="form-control input-stambuk" id="input-stambuk" name="stambuk" placeholder="Masukkan Stambuk">
                    </div>
                    <div class="mb-3">
                        <label for="waktu pembayaran" class="form-label">Waktu Pembayaran</label>
                        <input type="date" class="form-control input-waktupembayaran" id="input-waktupembayaran" name="waktupembayaran" placeholder="Masukkan Waktu Pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" class="form-control input-nominal" id="input-nominal" name="nominal" placeholder="Masukkan nominal">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status" id="input-status">
                            <option selected>Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

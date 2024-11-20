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
                                <a class="btn-edit edit-pembayaran me-3" role="button" href="<?= BASEURL; ?>/Pembayaran/editTampil/<?= $pmb['idpembayaran'] ?>" data-bs-toggle="modal" data-bs-target="#formPembayaran" data-id="<?= $pmb['idpembayaran']; ?>">
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
                    $historyData = [];

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

            <div class="text-center mt-3">
                <button class="btn btn-primary" onclick="window.print()">Cetak Pembayaran</button>
            </div>
        </div>
    </div>
</div>
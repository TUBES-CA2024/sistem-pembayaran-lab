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
                <h2 class="card-subtitle mb-2"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2>
                <p class="card-text">Jumlah Tagihan</p>
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
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75 add-tagihan" type="submit" data-bs-toggle="modal" data-bs-target="#formTagihan"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>

            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Tahun Akademik</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Matkul</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['tagihan'] as $index => $tgh): ?>
                        <tr>
                            <td class="text-center"><?= $index + 1 ?></td>
                            <td class="text-center"><?= $tgh['stambuk'] ?></td>
                            <td class="text-center"><?= $tgh['jumlah_tagihan'] ?></td>
                            <td class="text-center"><?= $tgh['angkatan'] ?></td>
                            <td class="text-center"><?= $tgh['tahun_akademik'] ?></td>
                            <td class="text-center"><?= $tgh['semester'] ?></td>
                            <td class="text-center"><?= $tgh['matakuliah'] ?></td>
                            <td>
                                <a
                                    class="btn-edit me-2"
                                    href="<?= BASEURL; ?>/Tagihan/editTampil/<?= $tgh['idtagihan'] ?>"
                                    role="button"
                                    method="POST">
                                    <img
                                        src="<?= BASEURL ?>/assets/img/edit.png"
                                        alt="icon-edit">
                                </a>
                                <button
                                    class="btn-delete"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDelete<?= $tgh['idtagihan']; ?>">
                                    <img
                                        src="<?= BASEURL ?>/assets/img/delete.png"
                                        alt="icon-delete">
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $tgh['idtagihan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="<?= BASEURL; ?>/Tagihan/hapus/<?= $tgh['idtagihan'] ?>" role="button" class="btn btn-primary">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="formTagihan" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Tambah Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Tagihan/tambah" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="formFileSm" class="mb-3">Upload file Excel:</label>
                        <input type="file" id="formFileSm" class="form-control form-control-sm" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
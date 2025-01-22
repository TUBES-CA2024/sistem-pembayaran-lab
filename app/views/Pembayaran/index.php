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
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75 add-pembayaran" type="submit" data-bs-toggle="modal" data-bs-target="#formPembayaran"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Waktu Pembayaran</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
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
                                <a
                                    class="btn-edit me-2"
                                    href="<?= BASEURL; ?>/Pembayaran/editTampil/<?= $pmb['idpembayaran'] ?>"
                                    role="button"
                                    method="POST">
                                    <img
                                        src="<?= BASEURL ?>/assets/img/edit.png"
                                        alt="icon-edit">
                                </a>
                                <!-- data-id="<?= $pmb['idpembayaran']; ?>" -->
                                <button
                                    class="btn-delete"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDelete<?= $pmb['idpembayaran']; ?>">
                                    <img
                                        src="<?= BASEURL ?>/assets/img/delete.png"
                                        alt="icon-delete">
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
                <form action="<?= BASEURL; ?>/Pembayaran/tambah" method="post">
                    <input type="hidden" id="hidden-idpembayaran" name="idpembayaran">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">

                    <div class="mb-3">
                        <label for="input-stambuk" class="form-label">Stambuk</label>
                        <select class="form-select" id="input-stambuk" name="stambuk" required>
                            <option selected disabled>Pilih Mahasiswa</option>
                            <?php foreach ($data['mahasiswa'] as $mhs) : ?>
                                <option value="<?= $mhs['stambuk'] ?>"><?= $mhs['stambuk'] ?> - <?= $mhs['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="input-waktupembayaran" class="form-label">Waktu Pembayaran</label>
                        <input type="date" class="form-control" id="input-waktupembayaran" name="waktupembayaran" required>
                    </div>

                    <div class="mb-3">
                        <label for="matkul" class="form-label">Mata Kuliah</label>
                        <?php foreach ($data['matkul'] as $matkul) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kodematakuliah[]" value="<?= $matkul['kodematakuliah'] ?>">
                                <label class="form-check-label" for="kodematakuliah-<?= $matkul['kodematakuliah'] ?>">
                                    <?= $matkul['namamatakuliah'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="text" id="nominalInput" class="form-control" name="nominal" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="input-status" class="form-label">Status</label>
                        <select class="form-select" id="input-status" name="status" required>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateNominal();
            });
        });

        function updateNominal() {
            var checkedBoxCount = 0;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedBoxCount++;
                }
            });
            var nominalInput = document.getElementById('nominalInput');
            nominalInput.value = checkedBoxCount * 55000;
        }
    });
</script>
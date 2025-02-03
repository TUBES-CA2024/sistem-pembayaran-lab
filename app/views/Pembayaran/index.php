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
                                        <button
                                            class="btn btn-success opacity-75 add-pembayaran me-2"
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#formPembayaran"
                                            data-idtagihan="<?= $pmb['idtagihan'] ?>">
                                            <img
                                                src="<?= BASEURL ?>/assets/img/add.png"
                                                alt="icon-edit">
                                        </button>
                                        <a
                                            class="btn-edit"
                                            href="<?= BASEURL; ?>/Tagiahan/editTampil/<?= $pmb['idtagihan'] ?>"
                                            role="button"
                                            method="POST">
                                            <img
                                                src="<?= BASEURL ?>/assets/img/edit.png"
                                                alt="icon-edit">
                                        </a>
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
                        <input type="text" class="form-control" id="stambuk" name="stambuk" value="<?= $pmb['stambuk']  ?>" readonly>
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

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".add-pembayaran");
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const idtagihan = this.getAttribute("data-idtagihan");
                console.log("ID Tagihan yang diklik:", idtagihan); // Debugging
                document.getElementById("hidden-idtagihan").value = idtagihan;
                document.getElementById("idtagihan").value = idtagihan;
            });
        });
    });
</script> -->

<!-- Modal Delete -->
<!-- <div class="modal fade" id="modalDelete<?= $pmb['idpembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </div> -->

<!-- <script>
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
</script> -->
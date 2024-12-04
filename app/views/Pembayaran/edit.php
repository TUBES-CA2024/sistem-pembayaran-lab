<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">
<div class="container-usermanagement1">
    <div class=" row mt-5 ms-3 mb-2 ">
        <div class="col-12 d-flex justify-content-between">
            <h5>Edit Pembayaran Mahasiswa</h5>

        </div>
    </div>

    <div class="overflow-y-auto" style="max-height: 81vh;">
        <form action="<?= BASEURL; ?>/Pembayaran/editPembayaran" method="POST">
            <div class="container p-4">
                <div class="row rounded-4 shadow-lg">
                    <div class="col-12 col-md-8 mt-3 mx-auto">
                        <input type="hidden" name="idpembayaran" value="<?= $data['pembayaran']['idpembayaran']; ?>">
                        <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">
                        <input type="hidden" name="old_stambuk" value="<?= $data['mahasiswa']['stambuk']; ?>">
                        <div class="mb-3 d-flex">
                            <label for="kode-stambuk" class="form-label col-4">Stambuk</label>
                            <input type="text" class="form-control kode-stambuk" id="input-stambuk" name="stambuk" placeholder="Masukkan Stambuk" value="<?= $data['mahasiswa']['stambuk']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="nama" class="form-label col-4">Nama</label>
                            <input type="text" class="form-control input-nama" id="input-nama" name="nama" placeholder="Masukkan Nama" value="<?= $data['mahasiswa']['nama']; ?>">
                        </div>

                        <!-- Waktu Pembayaran -->
                        <div class="mb-3">
                            <label for="input-waktupembayaran" class="form-label">Waktu Pembayaran</label>
                            <input type="date" class="form-control " id="input-waktupembayaran" name="waktupembayaran"
                                value="<?= $data['pembayaran']['waktupembayaran'] = date('Y-m-d', strtotime($data['pembayaran']['waktupembayaran'])); ?>" required>
                        </div>
                        <!-- Mata Kuliah -->
                        <div class="mb-3">
                            <label for="matkul" class="form-label">Mata Kuliah</label>
                            <?php foreach ($data['matkul'] as $matkul) : ?>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="kodematakuliah[]"
                                        value="<?= $matkul['kodematakuliah']; ?>"
                                        <?= in_array($matkul['kodematakuliah'], array_column($data['matkul_select'], 'kodematakuliah')) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="kodematakuliah-<?= $matkul['kodematakuliah']; ?>">
                                        <?= $matkul['namamatakuliah']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Nominal Pembayaran -->
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="text" id="nominalInput" class="form-control" name="nominal"
                                value="<?= ($data['pembayaran']['nominal']) ?>" readonly>
                        </div>
                        <!-- Status Pembayaran -->
                        <div class="mb-3">
                            <label for="input-status" class="form-label">Status</label>
                            <select class="form-select" id="input-status" name="status" required>
                                <option selected disabled>Pilih Status</option>
                                <option value="Lunas" <?= $data['pembayaran']['status'] == 'Lunas' ? 'selected' : ''; ?>>Lunas</option>
                                <option value="Belum Lunas" <?= $data['pembayaran']['status'] == 'Belum Lunas' ? 'selected' : ''; ?>>Belum Lunas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <a href="<?= BASEURL; ?>/Pembayaran" type="button" class="btn btn-danger me-4 mt-2" role="button">Batal</a>
                            <button href="<?= BASEURL; ?>/Pembayaran" type="submit" class="btn btn-primary me-4 mt-2">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
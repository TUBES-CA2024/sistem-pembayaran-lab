<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">

<div class="container-fluid">
    <div class="row mt-5 mb-1 mx-auto ps-3">
        <div class="col-md-10">
            <h5>Registrasi Pembayaran Mahasiswa</h5>
        </div>
    </div>

    <div class="container-check overflow-y-auto" style="max-height: 75vh;">
        <div class="container pt-4">
            <div class="row rounded-4 shadow-lg pt-5 pb-3 mb-3 ps-4 pe-4 w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-6">
                        <?php General::flash(); ?>
                    </div>
                </div>
                <!-- Form dimulai di sini -->
                <form action="<?= BASEURL; ?>/Pembayaranmh/tambah" method="post">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser']; ?>">
                    <input type="hidden" name="status" value="Belum Lunas">
                    <input type="hidden" name="waktupembayaran" value="<?= date('Y-m-d H:i:s'); ?>">
                    <div class="mb-3">
                        <label for="kode-stambuk" class="form-label">Stambuk</label>
                        <input type="text" class="form-control input-stambuk" id="input-stambuk" name="stambuk" value="<?= $_SESSION['stambuk']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">Mata Kuliah</label>
                        <?php foreach ($data['matkul'] as $matkul) : ?>
                            <div class="form-check">
                                <input class="form-check-input" name="kodematakuliah[]" type="checkbox" value="<?= $matkul['kodematakuliah']; ?>" id="flexCheckDefault<?= $matkul['kodematakuliah']; ?>">
                                <label class="form-check-label" for="flexCheckDefault<?= $matkul['kodematakuliah']; ?>">
                                    <?= $matkul['namamatakuliah']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="text" id="nominalInput" class="form-control" name="nominal" value="" readonly>
                    </div>

                    <div class="container-fluid d-flex justify-content-center align-items-center">
                        <a href="<?= BASEURL; ?>/Pembayaranmh" class="btn btn-danger me-3 mt-2">Back</a>
                        <button type="submit" class="btn btn-primary mt-2">Daftar</button>
                    </div>
                </form>
                <!-- Form selesai di sini -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mengambil semua elemen checkbox
        var checkboxes = document.querySelectorAll('.form-check-input');

        // Mendengarkan perubahan pada setiap checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateNominal();
            });
        });

        // Fungsi untuk mengupdate nilai nominal
        function updateNominal() {
            var checkedBoxCount = 0;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedBoxCount++;
                }
            });

            // Mengupdate nilai pada input
            var nominalInput = document.getElementById('nominalInput');
            nominalInput.value = checkedBoxCount * 55000; // Nominal untuk satu mata kuliah
        }
    });
</script>
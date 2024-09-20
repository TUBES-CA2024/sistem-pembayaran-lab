<div class="container-fluid">
    <div class=" row mt-5 mb-1 mx-auto ps-3">
        <div class="col-md-10">
            <h5>Registrasi Pembayaran Mahasiswa</h5>
        </div>
        <div class="col-md-2 text-start">
            <form action="<?= BASEURL; ?>/Home/sudahAda" method="post">
                <a href="<?= BASEURL; ?>/Home" role="button" class="btn btn-danger me-3 mt-2" role="button"> Back</a>
                <button type="submit" class="btn btn-primary mt-2" role="button">Daftar</button>
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
                <input type="hidden" name="iduser" value="1">
                <input type="hidden" name="status" value="Belum Lunas">
                <input type="hidden" name="waktupembayaran" value="">
                <div class="mb-3">
                    <label for="kode-stambuk" class="form-label">Stambuk</label>
                    <input type="text" class="form-control input-stambuk" id="input-stambuk" name="stambuk" placeholder="Masukkan Stambuk">
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">Mata Kuliah</label>
                    <?php
                    foreach ($data['matkul'] as $matkul) :
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" name="kodematakuliah[]" type="checkbox" value="<?= $matkul['kodematakuliah']; ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?= $matkul['namamatakuliah']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" id="nominalInput" name="nominal" value="">
                </form>

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

            // Mengupdate nilai pada input hidden
            var nominalInput = document.getElementById('nominalInput');
            nominalInput.value = checkedBoxCount * 55000;
        }
    });
</script>
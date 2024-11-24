<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Beranda.css">

<div class="d-flex justify-content-between p-3">
    <div class="col-lg-3">
        <a href="<?= BASEURL ?>/Datamahasiswamh" class="nav-link">
            <div class="card p-4 bg-light shadow-lg text-body-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-7">
                        <h3 class="card-subtitle mb-3">Profil Mahasiswa</h3>
                        <!-- <h3 class="card-title mb-2"><?= $data['mahasiswa']['jumlahMahasiswa'] ?></h3> -->
                        <p class="card-text mb-2">Mahasiswa</p>
                    </div>
                    <div class="me-0">
                        <img src="<?= BASEURL ?>/assets/img/profil-icons.png" alt="foto-card4" width="120px">
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="<?= BASEURL ?>/Matakuliahmh" class="nav-link">
            <div class="card p-4 bg-light shadow-lg text-body-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-7">
                        <h3 class="card-subtitle mb-3">Mata Kuliah Mahasiswa</h3>
                        <!-- <h3 class="card-title mb-2"><?= $data['matkul']['jumlahMatkul'] ?></h3> -->
                        <p class="card-text mb-2">Jumlah</p>
                    </div>
                    <div class="me-0">
                        <img src="<?= BASEURL ?>/assets/img/matkulmh-icons.png" alt="foto-card4" width="110px">
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="<?= BASEURL ?>/Pembayaranmh" class="nav-link">
            <div class="card p-4 bg-light shadow-lg text-body-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-7">
                        <h3 class="card-subtitle mb-3">Pembayaran Mahasiswa</h3>
                        <!-- <h3 class="card-title mb-2"><?= $data['pembayaran']['jumlahPembayaran'] ?></h3> -->
                        <p class="card-text mb-2">Mahasiswa</p>
                    </div>
                    <div class="mb-0">
                        <img src="<?= BASEURL ?>/assets/img/pembayaranmh-icons.png" alt="foto-card4" width="100px">
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>

<script>
    function previewAndSubmit(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-image-preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
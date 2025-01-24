<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Beranda.css">
<div class="row p-1 ">
    <div class="col-12 text-body-secondary">
        <div class="row d-flex justify-content-between align-items-center">

            <div class="col-lg-3 p-3">
                <a href="<?= BASEURL ?>/Datamahasiswamh" class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <!-- <div class="d-flex justify-content-between align-items-center"> -->
                            <div class="col-7 card-body">
                                <h5 class="card-title">Profil Mahasiswa</h5>
                                <p class="card-text">Mahasiswa</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/profil-icons.png"
                                    alt="foto-card4"
                                    width="100px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 p-3">
                <a href="<?= BASEURL ?>/Matakuliahmh" class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <!-- <div class="d-flex justify-content-between align-items-center"> -->
                        <div class="row">
                            <div class="col-7 card-body">
                                <h5 class="card-title">Mata Kuliah</h5>
                                <p class="card-text">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/matkulmh-icons.png"
                                    alt="foto-card4"
                                    width="110px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 p-3">
                <a href="<?= BASEURL ?>/Pembayaranmh" class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <!-- <div class="d-flex justify-content-between align-items-center"> -->
                            <div class="col-7 card-body">
                                <h5 class="card-title ">Pembayaran</h5>
                                <p class="card-text">Mahasiswa</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/pembayaranmh-icons.png"
                                    alt="foto-card4"
                                    width="100px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
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
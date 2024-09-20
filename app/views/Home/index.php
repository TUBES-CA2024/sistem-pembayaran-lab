<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Home.css" />
<div class="container container-home">
    <div class="container text-center">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="row mt-3">
                <div class="col-lg-4 mx-auto position-relative">
                    <?php General::flash(); ?>
                </div>
            </div>
            <!-- <div class="col p-3 m-4">
                <img class="fikom-icon" src="<?= BASEURL ?>/assets/img/icon-cek.png" alt="fikom">
            </div> -->
            <div class="col col-lg-6 p-5 m-5">
                <div class="card cek-pembayaran p-3 mx-auto opacity-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">CHECK PEMBAYARAN</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php stambukCek::flash(); ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card form-cek-pembayaran d-flex justify-content-center align-items-center p-3 h-75">
                            <form action="<?= BASEURL; ?>/Home/check" method="POST" class="mt-4">
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="stambuk" placeholder="Masukkan Stambuk" required>
                                </div>
                                <button type="submit" class="btn-cek ">Check</button>
                                <button type="button" class="btn btn-link mt-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalDaftar">Registrasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="w-100">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Daftar Pembayaran</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="text-center">Apakah Anda Pernah Membayar di Semester Sebelumnya?</h6>
            </div>
            <div class="modal-footer align-self-center border-top-0">
                <a href="<?= BASEURL; ?>/Home/daftarBelum" role="button" class="btn btn-secondary">Belum</a>
                <a href="<?= BASEURL; ?>/Home/daftarSudah" role="button" class="btn btn-primary">Pernah</a>
            </div>
        </div>
    </div>
</div>
<div class="row p-3">
    <div class="col-lg-10%">
        <div class="card p-0">
            <div class="d-flex justify-content-end align-items-center">
                <div>
                    <h6 class="text-primary mb-0">
                        <?= isset($data['nama']) && !empty($data['nama']) ? $data['nama'] : 'Nama belum diisi'; ?>
                    </h6>
                    <small style="padding-left: 35%;"><?= $_SESSION['stambuk']; ?></small>
                </div>
                <div class="me-3">
                    <a href="<?= BASEURL ?>/Datamahasiswamh" class="nav-link">
                        <img src="<?= $data['mahasiswa']['foto']; ?>" alt="Foto Wajah Profil" width="140px" class="rounded-circle border" style="width:60px; height:60px; border-radius:50%;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
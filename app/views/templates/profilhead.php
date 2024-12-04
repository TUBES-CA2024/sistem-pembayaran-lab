<div class="row p-2">
    <div class="col-lg-10%">
        <div class="card p-1">
            <div class="d-flex justify-content-end align-items-center">
                <!-- Bagian Teks -->
                <div class="text-end me-3">
                    <h6 class="text-primary mb-0">
                        <?= isset($data['nama']) && !empty($data['nama']) ? $data['nama'] : 'Nama belum diisi'; ?>
                    </h6>
                    <small><?= $_SESSION['stambuk']; ?></small>
                </div>

                <!-- Bagian Foto -->
                <div>
                    <a href="<?= BASEURL ?>/Datamahasiswamh" class="nav-link">
                        <img src="<?= $data['mahasiswa']['foto']; ?>" alt="Foto Wajah Profil" class="rounded-circle border" style="width:60px; height:60px; border-radius:50%;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
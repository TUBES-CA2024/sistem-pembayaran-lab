<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswamh.css">
<div class="container py-4">
    <div class="row">
        <div class="col-lg-6">
            <?php General::flash(); ?>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-start">

        <!-- Profile Card -->
        <div class="card shadow-lg bg-white" style="width: 30rem;">
            <div class="profile-container text-center">

                <div class="profile-image-wrapper position-relative py-3">
                    <img
                        id="profile-image-preview"
                        src="<?= !empty($data['mahasiswa']['foto']) ? $data['mahasiswa']['foto'] : BASEURL . '/assets/img/profil-icons.png'; ?>"
                        alt="Foto Wajah Profil"
                        width="140px"
                        class="rounded-circle border"
                        style="width:150px; height:150px; border-radius:50%;">
                    <form action="<?= BASEURL; ?>/Datamahasiswamh/updateFotoMahasiswa" method="POST" enctype="multipart/form-data" class="position-absolute" style="bottom: 10px; right: 120px;">
                        <label for="upload-foto" class="upload-photo-icon">
                            <img src="<?= BASEURL ?>/assets/img/upload-icons.png" alt="Upload Icon" class="edit-icon bg-light rounded-circle border p-1 shadow" width="30px">
                        </label>
                        <input type="file" id="upload-foto" name="foto" accept="image/*" onchange="previewAndSubmit(this)" hidden>
                    </form>
                </div>

                <h5 class="card-title py-0"><?= isset($data['nama']) && !empty($data['nama']) ? $data['nama'] : 'Nama belum diisi'; ?></h5>
                <p class="card-text"><?= $_SESSION['stambuk']; ?></p>
                <p class="card-text text-muted"><?= isset($data['mahasiswa']['prodi']) && !empty($data['mahasiswa']['prodi']) ? $data['mahasiswa']['prodi'] : 'Prodi belum diisi'; ?></p>
                <hr>
                <p><img src="<?= BASEURL ?>/assets/img/email-icons.png" alt="Email Icon" width="25"> <?= isset($data['mahasiswa']['email']) && !empty($data['mahasiswa']['email']) ? $data['mahasiswa']['email'] : 'Email belum diisi'; ?></p>
                <p><img src="<?= BASEURL ?>/assets/img/phone-icons.png" alt="Phone Icon" width="25"> <?= isset($data['mahasiswa']['telepon']) && !empty($data['mahasiswa']['telepon']) ? $data['mahasiswa']['telepon'] : 'Telepon belum diisi'; ?></p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="card shadow-lg bg-white ms-4" style="width: 100%;">
            <div class="card-header bg-info text-white">
                <strong>Data Pribadi</strong>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/Datamahasiswamh/simpan" method="post">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">
                    <input type="hidden" name="status" value="Belum Lunas">
                    <input type="hidden" name="waktupembayaran" value="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="program" class="form-label">Tingkat & program Studi <span style="color: red;">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="prodi" <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?> required>
                                <option value="" <?= !isset($data['mahasiswa']['prodi']) ? 'selected disabled' : '' ?>>Pilih Prodi</option>
                                <option value="Teknik Informatika" <?= isset($data['mahasiswa']['prodi']) && $data['mahasiswa']['prodi'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                                <option value="Sistem Informasi" <?= isset($data['mahasiswa']['prodi']) && $data['mahasiswa']['prodi'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
                            <input type="text" class="form-control input-nama" id="input-nama" name="nama"
                                value="<?= $data['mahasiswa']['nama'] ?? '' ?>"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'readonly' : '' ?> placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stambuk" class="form-label">Stambuk <span style="color: red;">*</span></label>
                            <input type="text" class="form-control input-stambuk" id="input-stambuk" value="<?= $_SESSION['stambuk']; ?>" readonly>
                            <input type="hidden" name="stambuk" value="<?= $_SESSION['stambuk']; ?>">
                        </div>

                        <div class=" col-md-6 mb-3">
                            <label for="phone" class="form-label">Telepon <span style="color: red;">*</span></label>
                            <input type="text" class="form-control input-telepon" id="input-telepon" name="telepon"
                                value="<?= $data['mahasiswa']['telepon'] ?? '' ?>"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'readonly' : '' ?> placeholder="Masukkan Telepon" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control input-email" id="input-email" name="email"
                                value="<?= $data['mahasiswa']['email'] ?? '' ?>"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'readonly' : '' ?> placeholder="Masukkan Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="class" class="form-label">Kelas</label>
                            <select class="form-select" aria-label="Default select example" name="idkelas"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?> required>
                                <option value="" <?= !isset($data['mahasiswa']['idkelas']) ? 'selected disabled' : '' ?>>Pilih Kelas</option>
                                <?php foreach ($data['kelas'] as $kls) : ?>
                                    <option value="<?= $kls['idkelas']; ?>" <?= isset($data['mahasiswa']['idkelas']) && $data['mahasiswa']['idkelas'] == $kls['idkelas'] ? 'selected' : '' ?>><?= $kls['namekelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jeniskelamin"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?> required>
                                <option value="" <?= !isset($data['mahasiswa']['jeniskelamin']) ? 'selected disabled' : '' ?>>Jenis Kelamin</option>
                                <option value="Laki-Laki" <?= isset($data['mahasiswa']['jeniskelamin']) && $data['mahasiswa']['jeniskelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= isset($data['mahasiswa']['jeniskelamin']) && $data['mahasiswa']['jeniskelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="religion" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" name="namaagama"
                                <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?> required>
                                <option value="" <?= !isset($data['mahasiswa']['namaagama']) ? 'selected disabled' : '' ?>>Pilih Agama</option>
                                <option value="Islam" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen Protestan" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Kristen Protestan' ? 'selected' : '' ?>>Kristen Protestan</option>
                                <option value="Kristen Katolik" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Kristen Katolik' ? 'selected' : '' ?>>Kristen Katolik</option>
                                <option value="Hindu" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= isset($data['mahasiswa']['namaagama']) && $data['mahasiswa']['namaagama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="input-alamat" class="form-control" name="alamat" rows="3"
                            <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'readonly' : '' ?>><?= $data['mahasiswa']['alamat'] ?? '' ?></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?>>Simpan</button>
                        <button type="reset" class="btn btn-secondary" <?= isset($data['mahasiswa']['isCompleted']) && $data['mahasiswa']['isCompleted'] == 1 ? 'disabled' : '' ?>>Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewAndSubmit(inputFile) {
        const file = inputFile.files[0];
        const preview = document.getElementById('profile-image-preview');

        if (file) {
            // Membuat objek URL untuk gambar yang diunggah
            const reader = new FileReader();

            reader.onload = function(e) {
                // Mengubah src dari gambar pratinjau
                preview.src = e.target.result;
            };

            // Membaca file sebagai DataURL
            reader.readAsDataURL(file);
        }

        // Submit formulir secara otomatis
        inputFile.form.submit();
    }

    function previewAndSubmit(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-image-preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);

            // Submit form secara otomatis
            input.closest('form').submit();
        }
    }
</script>
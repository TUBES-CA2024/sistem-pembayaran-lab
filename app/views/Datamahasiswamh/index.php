<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswamh.css">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-start">

        <!-- Profile Card -->
        <div class="card shadow-lg bg-white" style="width: 18rem;">
            <div class="card-body text-center">
                <img src="<?= BASEURL ?>/assets/img/profil-icons.png" alt="foto-card4" width="100px" class="rounded-circle mb-3">
                <h5 class="card-title">FULAN FULAN FULAN</h5>
                <p class="card-text">13020220001</p>
                <p class="card-text text-muted">Teknik Informatika</p>
                <hr>
                <p><img src="email-icon.png" alt="Email Icon" width="20"> Fulan@gmail.com</p>
                <p><img src="phone-icon.png" alt="Phone Icon" width="20"> +628123456789</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="card shadow-lg bg-white ms-4" style="width: 100%;">
            <div class="card-header bg-info text-white">
                <strong>Data Pribadi</strong>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="program" class="form-label">Tingkat & program Studi *</label>
                            <input type="text" id="program" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Lengkap *</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stambuk" class="form-label">Stambuk *</label>
                            <input type="text" id="stambuk" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="class" class="form-label">Kelas</label>
                            <input type="text" id="class" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Laki-laki">
                                    <label class="form-check-label" for="male">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan">
                                    <label class="form-check-label" for="female">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="religion" class="form-label">Agama</label>
                            <input type="text" id="religion" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea id="address" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="text-center py-3">
    <small>Copyright © <a href="https://iclabs2024.com" target="_blank">iclabs2024</a></small>
</div>
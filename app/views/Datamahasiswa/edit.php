<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswa.css">
<div class="container-usermanagement1">
    <div class=" row mt-5 ms-3 mb-5 ">
        <div class="col-12 d-flex justify-content-between">
            <h5>Edit Data Mahasiswa</h5>
            <div class="text-end">
                <form action="<?= BASEURL; ?>/Datamahasiswa/editMahasiswa" method="POST" enctype="multipart/form-data">
                    <a href="<?= BASEURL; ?>/Datamahasiswa" type="button" class="btn btn-danger me-4 mt-2" role="button">Batal</a>
                    <button href="<?= BASEURL; ?>/Datamahasiswa" type="submit" class="btn btn-primary me-4 mt-2">Edit Data</button>
            </div>
        </div>
    </div>

    <div class="overflow-y-auto" style="max-height: 72vh;">
        <div class="container p-4">
            <div class="row rounded-4 shadow-lg">

                <div class="col-12 col-md-8 mt-3 mx-auto">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">
                    <input type="hidden" name="idpembayaran" value="<?= $data['pembayaran']['idpembayaran'] ?>">
                    <input type="hidden" name="isCompleted" value="<?= $data['mahasiswa']['isCompleted']; ?>">
                    <input type="hidden" name="foto_lama" value="<?= $data['mahasiswa']['foto']; ?>">
                    <input type="hidden" name="old_stambuk" value="<?= $data['mahasiswa']['stambuk']; ?>">
                    <div class="mb-3 d-flex">
                        <label for="kode-stambuk" class="form-label col-4">Stambuk</label>
                        <input type="text" class="form-control input-stambuk" id="input-stambuk" name="stambuk" placeholder="Masukkan Stambuk" value="<?= $data['mahasiswa']['stambuk']; ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="nama" class="form-label col-4">Nama</label>
                        <input type="text" class="form-control input-nama" id="input-nama" name="nama" placeholder="Masukkan Nama" value="<?= $data['mahasiswa']['nama']; ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="sks" class="form-label col-4">Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="idkelas">
                            <option selected disabled>Pilih Kelas</option>
                            <?php foreach ($data['kelas'] as $kls) :
                                if ($kls['idkelas'] == $data['mahasiswa']['idkelas']) : ?>
                                    <option value="<?= $kls['idkelas']; ?>" selected><?= $kls['namekelas']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $kls['idkelas']; ?>"><?= $kls['namekelas']; ?></option>
                            <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="prodi" class="form-label col-4">Prodi</label>
                        <select class="form-select" aria-label="Default select example" name="prodi">
                            <option selected disabled>Pilih Prodi</option>
                            <option value="Teknik Informatika" <?php if ($data['mahasiswa']['prodi'] == "Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?php if ($data['mahasiswa']['prodi'] == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="mb-3 d-flex">
                        <label for="namaagama" class="form-label col-4">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="namaagama">
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam" <?php if ($data['mahasiswa']['namaagama'] == "Islam") echo "selected"; ?>>Islam</option>
                            <option value="Kristen Protestan" <?php if ($data['mahasiswa']['namaagama'] == "Kristen Protestan") echo "selected"; ?>>Kristen Protestan</option>
                            <option value="Kristen Katolik" <?php if ($data['mahasiswa']['namaagama'] == "Kristen Katolik") echo "selected"; ?>>Kristen Katolik</option>
                            <option value="Hindu" <?php if ($data['mahasiswa']['namaagama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                            <option value="Buddha" <?php if ($data['mahasiswa']['namaagama'] == "Buddha") echo "selected"; ?>>Buddha</option>
                            <option value="Konghucu" <?php if ($data['mahasiswa']['namaagama'] == "Konghucu") echo "selected"; ?>>Konghucu</option>
                        </select>
                    </div>

                    <div class="mb-3 d-flex">
                        <label for="email" class="form-label col-4">Email</label>
                        <input type="text" class="form-control input-email" id="input-email" name="email" placeholder="Masukkan email" value="<?= $data['mahasiswa']['email']; ?>">
                    </div>

                    <div class="mb-3 d-flex">
                        <label for="telepon" class="form-label col-4">Telepon</label>
                        <input type="text" class="form-control input-telepon" id="input-telepon" name="telepon" placeholder="Masukkan telepon" value="<?= $data['mahasiswa']['telepon']; ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="jeniskelamin" class="form-label col-4">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                            <option selected disabled>Jenis Kelamin</option>
                            <option value="Laki-Laki" <?php if ($data['mahasiswa']['jeniskelamin'] == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($data['mahasiswa']['jeniskelamin'] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="alamat" class="form-label col-4">Alamat</label>
                        <input type="text" class="form-control input-alamat" id="input-alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $data['mahasiswa']['alamat']; ?>">
                    </div>

                    <div class="mb-3 d-flex">
                        <label for="foto" class="form-label col-4">Foto</label>
                        <input type="file" class="form-control input-foto" id="input-foto" name="foto">
                    </div>
                    <div id="fotoHelp" class="mb-3 form-text" style="margin-left: 33%;">
                        <img id="profile-image-preview" src="<?= BASEURL . '/' . $data['mahasiswa']['foto']; ?>" alt="Foto Wajah Profil" style="width:150px; height:150px; border-radius: 5%;">
                        Unggah file gambar dengan format JPG, JPEG, atau PNG.
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
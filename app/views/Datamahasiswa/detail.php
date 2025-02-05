<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswa.css">
<div class="container-usermanagement1">
    <div class=" row mt-5 ms-3 mb-5 ">
        <div class="col-12 d-flex justify-content-between">
            <h5>Detail Data Mahasiswa</h5>
            <a
                href="<?= BASEURL; ?>/Datamahasiswa"
                type="button"
                class="btn btn-info text-white"
                role="button"><i class="fa-solid fa-arrow-left" style="color: #f1f2f3;"></i> Back</a>
        </div>
    </div>

    <div class="overflow-y-auto" style="max-height: 76vh;">
        <div class="container p-4">
            <div class="row rounded-4 shadow-lg">
                <div class="col-12 col-md-8 mt-3 mx-auto">
                    <fieldset disabled>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Stambuk Mahasiswa</label>
                            <input
                                type="text"
                                id="disabledTextInput"
                                class="form-control"
                                value="<?= $data['mahasiswa']['stambuk']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Nama Mahasiswa</label>
                            <input
                                type="text"
                                id="disabledTextInput"
                                class="form-control"
                                value="<?= $data['mahasiswa']['nama']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Kelas Mahasiswa</label>
                            <input
                                type="text"
                                id="disabledTextInput"
                                class="form-control"
                                value="<?= $data['mahasiswa']['namekelas']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Prodi Mahasiswa</label>
                            <input
                                type="text"
                                id="disabledTextInput"
                                class="form-control"
                                value="<?= $data['mahasiswa']['prodi']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Agama Mahasiswa</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="<?= $data['mahasiswa']['namaagama']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Email Mahasiswa</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="<?= $data['mahasiswa']['email']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Telepon Mahasiswa</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="<?= $data['mahasiswa']['telepon']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">JenisKelamin Mahasiswa</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="<?= $data['mahasiswa']['jeniskelamin']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Alamat Mahasiswa</label>
                            <input type="text" id="disabledTextInput" class="form-control" value="<?= $data['mahasiswa']['alamat']; ?>">
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="disabledTextInput" class="form-label col-4">Foto Mahasiswa</label>
                            <img
                                id="profile-image-preview"
                                src="<?= BASEURL . '/' . $data['mahasiswa']['foto']; ?>"
                                alt="Foto Wajah Profil"
                                style="width:150px; height:150px; border-radius: 5%;">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
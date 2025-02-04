<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswa.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card shadow-lg text-body-secondary bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/data-mahasiswa.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Data Mahasiswa</h5>
                <h2 class="card-subtitle mb-2"><?= $data['countmahasiswa']['jumlahMahasiswa'] ?></h2>
                <p class="card-text">Jumlah Data Mahasiswa</p>
            </div>
        </div>
    </div>
</div>

<div class="container-user rounded col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 75vh;">
        <div class="row">
            <div class="col-lg-6 mb-2">
                <?php PesanFlash::flash(); ?>
            </div>
        </div>
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75" type="button" data-bs-toggle="modal" data-bs-target="#formMahasiswa"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>
            <table id="myTable" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['mahasiswa'] as $mhs) :
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $mhs['stambuk']; ?></td>
                            <td><?= $mhs['nama']; ?></td>
                            <td><?= $mhs['namekelas']; ?></td>
                            <td><?= $mhs['email']; ?></td>
                            <td><?= $mhs['telepon']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a class="btn btn-success btn-edit" role="button" href="<?= BASEURL; ?>/Datamahasiswa/editTampil/<?= $mhs['stambuk'] ?>">
                                        <img
                                            src="<?= BASEURL ?>/assets/img/edit.png"
                                            alt="icon-edit">
                                    </a>
                                    <a class="btn-delete" role="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $mhs['stambuk']; ?>">
                                        <img
                                            src="<?= BASEURL ?>/assets/img/delete.png"
                                            alt="icon-delete">
                                    </a>
                                    <a class="btn-detail" role="button" href="<?= BASEURL; ?>/Datamahasiswa/detail/<?= $mhs['stambuk'] ?>">
                                        <img
                                            src="<?= BASEURL ?>/assets/img/detail.png"
                                            alt="icon-detail">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $mhs['stambuk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="w-100">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Hapus Data</h1>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-center">Anda Yakin Ingin Hapus Data ini?</h6>
                                    </div>
                                    <div class="modal-footer align-self-center border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                        <a href="<?= BASEURL; ?>/Datamahasiswa/hapus/<?= $mhs['stambuk'] ?>" role="button" class="btn btn-primary">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="formMahasiswa" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Datamahasiswa/tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>">
                    <input type="hidden" name="status" value="Belum Lunas">
                    <div class="mb-3">
                        <label for="kode-stambuk" class="form-label">Stambuk</label>
                        <input type="text" class="form-control input-stambuk" id="input-stambuk" name="stambuk" placeholder="Masukkan Stambuk" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control input-nama" id="input-nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="idkelas" required>
                            <option value="1" selected disabled>Pilih Kelas</option>
                            <?php
                            foreach ($data['kelas'] as $kls) :
                            ?>
                                <option value="<?= $kls['idkelas']; ?>"><?= $kls['namekelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <select class="form-select" aria-label="Default select example" name="prodi" required>
                            <option selected disabled>Pilih Prodi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="namaagama" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="namaagama" required>
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input-email" id="input-email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-telepon">Telepon</label>
                        <input type="text" class="form-control input-telepon" id="input-telepon" name="telepon" placeholder="Masukkan Telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-jeniskelamin">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jeniskelamin" required>
                            <option selected disabled>Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-alamat">Alamat</label>
                        <input type="text" class="form-control input-alamat" id="input-alamat" name="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-foto" class="form-foto">Foto Profil</label>
                        <input type="file" class="form-control input-foto" id="input-foto" name="foto" accept="image/*" aria-describedby="fotoHelp">
                        <div id="fotoHelp" class="form-text">Unggah file gambar dengan format JPG, JPEG, atau PNG.</div>
                    </div>
                    <div class="modal-footer modal-matkul">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
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
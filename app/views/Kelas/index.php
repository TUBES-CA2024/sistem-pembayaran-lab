<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswa.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card shadow-lg text-body-secondary bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img
                    src="<?= BASEURL ?>/assets/img/kelas.png"
                    alt="foto-card4"
                    width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Kelas Mahasiswa</h5>
                <h2 class="card-subtitle mb-2"><?= $data['countkelas']['jumlahKelas'] ?></h2>
                <p class="card-text">Jumlah Kelas Mahasiswa</p>
            </div>
        </div>
    </div>
</div>

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 75vh;">
        <div class="row">
            <div class="col-lg-6 mb-2">
                <?php PesanFlash::flash(); ?>
            </div>
        </div>
        <div class="rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75" type="submit" data-bs-toggle="modal" data-bs-target="#formKelas"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>
            <table id="myTable" class="table table-bordered table-striped " style="width:30%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['kelas'] as $kls) :
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $kls['namekelas']; ?></td>
                            <td>
                                <button class="btn-delete ms-1" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $kls['idkelas']; ?>"><img src="<?= BASEURL ?>/assets/img/delete.png" alt="icon-delete"></button>
                            </td>
                        </tr>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $kls['idkelas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="<?= BASEURL; ?>/Kelas/hapusKelas/<?= $kls['idkelas'] ?>" role="button" class="btn btn-primary">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Kelas-->
        <div class="modal fade" id="formKelas" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Kelas Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/Kelas/tambahKelas" method="post">
                            <div class="mb-3">
                                <input type="hidden" id="idkelas" name="idkelas" required>
                                <label for="namekelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control input-namekelas" id="input-namekelas" name="namekelas" placeholder="Masukkan Kelas Baru" required>
                            </div>
                    </div>
                    <div class="modal-footer modal-matkul">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
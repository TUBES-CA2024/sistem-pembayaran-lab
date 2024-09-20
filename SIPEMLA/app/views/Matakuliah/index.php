<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/matakuliah.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/matakuliah.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Mata Kuliah</h5>
                <h2 class="card-subtitle mb-2"><?=$data['countmatkul']['jumlahMatkul']?></h2>
                <p class="card-text">Jumlah Mata Kuliah</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="row">
            <div class="col-lg-6 mb-2">
                <?php General::flash(); ?>
            </div>
        </div>
        <div class="rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75 add-matkul mb-1" type="submit" data-bs-toggle="modal" data-bs-target="#formUser"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>
            <table id="myTable" class="table table-bordered table-striped " style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 0;
                    foreach ($data['matkul'] as $matkul) :
                        $no++;
                    ?>

                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $matkul['kodematakuliah']; ?></td>
                            <td><?= $matkul['namamatakuliah']; ?></td>
                            <td><?= $matkul['sks']; ?></td>
                            <td>
                                <a class="col btn-edit edit-matkul" role="button" href="<?= BASEURL; ?>/Matakuliah/edit/<?= $matkul['kodematakuliah'] ?>" data-bs-toggle="modal" data-bs-target="#formUser" data-id="<?= $matkul['kodematakuliah']; ?>"><img src="<?= BASEURL ?>/assets/img/edit.png" alt="icon-edit"></a>
                                <button class="col btn-delete delete-matkul" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $matkul['kodematakuliah']; ?>"><img src="<?= BASEURL ?>/assets/img/delete.png" alt="icon-delete"></button>
                            </td>
                        </tr>
                         <!-- Modal Delete -->
                         <div class="modal fade" id="modalDelete<?= $matkul['kodematakuliah']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="w-100">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Hapus Data</h1>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-center">Anda Yakin Ingin Hapus Mata Kuliah ini?</h6>
                                    </div>
                                    <div class="modal-footer align-self-center border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                        <a href="<?= BASEURL; ?>/Matakuliah/hapus/<?= $matkul['kodematakuliah'] ?>" role="button" class="btn btn-primary">Yes</a>
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

<!-- Modal-->
<div class="modal fade" id="formUser" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Mata Kuliah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Matakuliah/tambah" method="post">
                    <input type="hidden" class="id" name="old_kodematakuliah" id="hidden-kodematkul">
                    <div class="mb-3">
                        <label for="kode-mata-kuliah" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control input-kodematkul" id="input-kodematkul" name="kodematakuliah" placeholder="Masukkan Kode Mata Kuliah">
                    </div>
                    <div class="mb-3">
                        <label for="M" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control input-matkul" id="input-matkul" name="namamatakuliah" placeholder="Masukkan Nama Mata Kuliah">
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" class="form-control input-sks" id="input-sks" name="sks" placeholder="Masukkan SKS">
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
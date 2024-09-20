<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/usermanagement.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/user-management.png" alt="foto-card4" width="100px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Akun User</h5>
                <h2 class="card-subtitle mb-2"><?=$data['countuser']['jumlahUser']?></h2>
                <p class="card-text">Jumlah Akun User</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user rounded col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="row">
            <div class="col-lg-6 mb-2">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <div class="text-start mb-3">
                <button class="btn btn-success opacity-75 add-user" type="button" data-bs-toggle="modal" data-bs-target="#formUser"><img src="<?= BASEURL ?>/assets/img/add.png" alt="">Tambah</button>
            </div>
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 0;
                    foreach ($data['user'] as $user) :
                        $no++;
                    ?>

                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a class="btn-edit edit-user" role="button" href="<?= BASEURL; ?>/Usermanagement/edit/<?= $user['iduser'] ?>" data-bs-toggle="modal" data-bs-target="#formUser" data-id="<?= $user['iduser']; ?>"><img src="<?= BASEURL ?>/assets/img/edit.png" alt="icon-edit"></a>
                                <button class="btn-delete" type="button"  data-bs-toggle="modal" data-bs-target="#modalDelete<?= $user['iduser'];?>"><img src="<?= BASEURL ?>/assets/img/delete.png" alt="icon-delete"></button>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $user['iduser']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="w-100">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Hapus User</h1>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-center">Anda Yakin Ingin Hapus User ini?</h6>
                                    </div>
                                    <div class="modal-footer align-self-center border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                        <a href="<?= BASEURL; ?>/Usermanagement/hapus/<?= $user['iduser'] ?>" role="button" class="btn btn-primary">Yes</a>
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
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Usermanagement/tambah" method="post">
                    <input type="hidden" class="id" name="iduser" id="id">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control input-username" id="input-username" name="username" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control input-password" id="input-password" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select option-role" aria-label="Default select example" name="role" id="option-role">
                            <option selected>Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Kepala Lab">Kepala Lab</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer modal-user">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

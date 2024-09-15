<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/datamahasiswakp.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/data-mahasiswa.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Data Mahasiswa</h5>
                <h2 class="card-subtitle mb-2"><?=$data['countmahasiswa']['jumlahMahasiswa']?></h2>
                <p class="card-text">Jumlah Data Mahasiswa</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <table id="myTable" class="table table-bordered table-striped " style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Stambuk</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Action</th>
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
                            <td>
                                <a class="btn-detail text-decoration-none p-2" role="button" href="<?= BASEURL; ?>/Datamahasiswakp/detailkp/<?= $mhs['stambuk'] ?>"><img src="<?= BASEURL ?>/assets/img/detail.png" alt="icon-detail"></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
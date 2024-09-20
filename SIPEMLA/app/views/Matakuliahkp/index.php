<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/matakuliahkp.css">
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
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <table id="myTable" class="table table-bordered table-striped " style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
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
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
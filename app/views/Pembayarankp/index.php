<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayarankp.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/pembayaran.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Pembayaran</h5>
                <h2 class="card-subtitle mb-2"><?=$data['countpembayaran']['jumlahPembayaran']?></h2>
                <p class="card-text">Jumlah Pembayaran</p>
            </div>
        </div>
    </div>
</div>
<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 750px;">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Stambuk</th>
                        <th>Nama</th>
                        <th>Waktu Pembayaran</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['pembayaran'] as $pmb) :
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $pmb['stambuk']; ?></td>
                            <td><?= $pmb['nama']; ?></td>
                            <td><?= $pmb['waktupembayaran']; ?></td>
                            <td>Rp. <?= $pmb['nominal']; ?></td>
                            <td><?= $pmb['status']; ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
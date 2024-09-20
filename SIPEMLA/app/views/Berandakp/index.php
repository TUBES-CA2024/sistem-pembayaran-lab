<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Beranda.css">
<div class="row p-3">
    <div class="col-lg-3 p-2">
        <div class="card p-3 bg-light bg-gradient shadow-lg text-body-secondary">
            <div class="row">
                <div class="col-7 card-body">
                    <h6 class="card-subtitle mb-2">Mahasiswa</h6>
                    <h2 class="card-title"><?=$data['mahasiswa']['jumlahMahasiswa']?></h2>
                    <p class="card-text">Jumlah</p>
                </div>
                <div class="col-5 align-self-center">
                    <img src="<?= BASEURL ?>/assets/img/data-mahasiswa.png" alt="foto-card4" width="80px">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 p-2">
        <div class="card p-3 bg-light bg-gradient shadow-lg text-body-secondary">
            <div class="row">
                <div class="col-7 card-body">
                    <h6 class="card-subtitle mb-2">Mata Kuliah</h6>
                    <h2 class="card-title"><?=$data['matkul']['jumlahMatkul']?></h2>
                    <p class="card-text">Jumlah</p>
                </div>
                <div class="col-5 align-self-center">
                    <img src="<?= BASEURL ?>/assets/img/matakuliah.png" alt="foto-card4" width="80px">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 p-2">
        <div class="card p-3 bg-light bg-gradient shadow-lg text-body-secondary">
            <div class="row">
                <div class="col-7 card-body">
                    <h6 class="card-subtitle mb-2">Pembayaran</h6>
                    <h2 class="card-title"><?=$data['pembayaran']['jumlahPembayaran']?></h2>
                    <p class="card-text">Jumlah</p>
                </div>
                <div class="col-5 align-self-center">
                    <img src="<?= BASEURL ?>/assets/img/pembayaran.png" alt="foto-card4" width="80px">
                </div>
            </div>
        </div>
    </div>
</div>
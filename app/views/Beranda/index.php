<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Beranda.css">
<div class="overflow-y-auto" style="max-height: 95vh; overflow-x: hidden;">
    <div class="row px-3">
        <div class="col-lg-3 p-2">
            <div class="card p-3 bg-light shadow-lg text-body-secondary">
                <div class="row">
                    <div class="col-7 card-body">
                        <h6 class="card-subtitle mb-2">Akun User</h6>
                        <h2 class="card-title"><?= $data['user']['jumlahUser'] ?></h2>
                        <p class="card-text">Jumlah</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <img src="<?= BASEURL ?>/assets/img/user-management.png" alt="foto-card4" width="80px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 p-2">
            <div class="card p-3 bg-light shadow-lg text-body-secondary">
                <div class="row">
                    <div class="col-7 card-body">
                        <h6 class="card-subtitle mb-2">Mahasiswa</h6>
                        <h2 class="card-title"><?= $data['mahasiswa']['jumlahMahasiswa'] ?></h2>
                        <p class="card-text">Jumlah</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <img src="<?= BASEURL ?>/assets/img/data-mahasiswa.png" alt="foto-card4" width="80px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 p-2">
            <div class="card p-3 bg-light shadow-lg text-body-secondary">
                <div class="row">
                    <div class="col-7 card-body">
                        <h6 class="card-subtitle mb-2">Mata Kuliah</h6>
                        <h2 class="card-title"><?= $data['matkul']['jumlahMatkul'] ?></h2>
                        <p class="card-text">Jumlah</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <img src="<?= BASEURL ?>/assets/img/matakuliah.png" alt="foto-card4" width="80px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 p-2">
            <div class="card p-3 bg-light shadow-lg text-body-secondary">
                <div class="row">
                    <div class="col-7 card-body">
                        <h6 class="card-subtitle mb-2">Pembayaran</h6>
                        <h2 class="card-title"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2>
                        <p class="card-text">Jumlah</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <img src="<?= BASEURL ?>/assets/img/pembayaran.png" alt="foto-card4" width="80px">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-2">
        <div class="overflow-y-auto p-3" style="max-height: 64vh;">

            <div class="overflow-x-auto rounded-4 shadow-lg p-4" style="min-width: 860px;">
                <div class="row">
                    <div class="col-4">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-info me-2 text-white priode1" id="priode1"><i class="fa-solid fa-print" style="color: #f5f5f5;"></i> Priode 1</button>
                            <button type="submit" class="btn btn-info text-white priode2" id="priode2"><i class="fa-solid fa-print" style="color: #f5f5f5;"></i> Priode 2</button>
                    </div>
                    <div class="col-4">
                        <select class="form-select w-50" id="sortSelect">
                            <option selected value="1">Pilih Filter Urut</option>
                            <option value="1" id="asc">Terlama</option>
                            <option value="2" id="desc">Terbaru</option>
                        </select>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <div class="input-group mb-3 w-100">
                            <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="cariMahasiswa" id="cariMahasiswa" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                        </div>
                    </div>
                </div>
                <table id="tablePraPrint" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr class="bg-info bg-gradient">
                            <th class="text-center">No</th>
                            <th class="text-center">Stambuk</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Waktu Pembayaran</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="checkedAll" onkeydown="return event.key !== 'Enter';">
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                        $no = 0;
                        foreach ($data['pembayaran'] as $pmb) :
                            $no++;
                            $waktuPembayaran = $pmb['waktupembayaran'];

                            if ($waktuPembayaran != '0000-00-00' && $waktuPembayaran != '') {
                                $formattedDate = date('d-m-Y', strtotime($waktuPembayaran));
                            } else {
                                $formattedDate = '-';
                            }
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $pmb['stambuk']; ?></td>
                                <td class="text-center"><?= $pmb['nama']; ?></td>
                                <td class="text-center"><?= $formattedDate; ?></td>
                                <td class="text-center">Rp. <?= $pmb['nominal']; ?></td>
                                <td class="text-center"><?= $pmb['status']; ?></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" value="<?= $pmb['stambuk']; ?>" id="checkedOne" onkeydown="return event.key !== 'Enter';" name="stambuk[]"></td>
                            </tr>
                        <?php endforeach; ?>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
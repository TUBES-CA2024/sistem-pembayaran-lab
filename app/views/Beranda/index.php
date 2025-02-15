<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Beranda.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 text-body-secondary">
        <div class="row">

            <div class="col-lg-3 p-3">
                <a href="<?= BASEURL ?>/Usermanagement" class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-2">Akun User</h6>
                                <h2 class="card-title"><?= $data['user']['jumlahUser'] ?></h2>
                                <p class="card-text">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/user-management.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 p-3">
                <a
                    href="<?= BASEURL ?>/Datamahasiswa"
                    class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-2">Mahasiswa</h6>
                                <h2 class="card-title"><?= $data['mahasiswa']['jumlahMahasiswa'] ?></h2>
                                <p class="card-text">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/data-mahasiswa.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 p-3">
                <a
                    href="<?= BASEURL ?>/Matakuliah"
                    class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-2">Mata Kuliah</h6>
                                <h2 class="card-title"><?= $data['matkul']['jumlahMatkul'] ?></h2>
                                <p class="card-text">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/matakuliah.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 p-3">
                <a
                    href="<?= BASEURL ?>/Kelas"
                    class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-2">Kelas</h6>
                                <h2 class="card-title"><?= $data['kelas']['jumlahKelas'] ?></h2>
                                <p class="card-text">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/kelas.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 p-3">
                <a
                    href="<?= BASEURL ?>/Tagihan"
                    class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-4">Tagihan</h6>
                                <h2 class="card-title"><?= $data['counttagihan']['jumlahTagihan'] ?></h2>
                                <p class="card-text mb-1">Jumlah</p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/tagihan.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 p-3">
                <a
                    href="<?= BASEURL ?>/Pembayaran"
                    class="nav-link">
                    <div class="card p-3 bg-light shadow-lg text-body-secondary">
                        <div class="row">
                            <div class="col-7 card-body">
                                <h6 class="card-subtitle mb-2">Pembayaran</h6>
                                <p class="card-title">Lunas <?= $data['countLunas']['jumlahLunas'] ?></p>
                                <p class="card-title">Belum Lunas <?= $data['countBelumLunas']['jumlahBelumLunas'] ?></p>
                                <p class="card-text">Jumlah <?= $data['countpembayaran']['jumlahPembayaran'] ?></p>
                            </div>
                            <div class="col-5 align-self-center">
                                <img
                                    src="<?= BASEURL ?>/assets/img/pembayaran.png"
                                    alt="foto-card4"
                                    width="80px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>
</div>


<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4">
            <div class="row">

                <div class="col-4">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formBeranda">Filter Laporan</button>
                </div>

                <div class="col-4 ">
                    <div class="input-group mb-3 w-100">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari Mahasiswa..."
                            name="cariMahasiswa"
                            id="cariMahasiswa"
                            autocomplete="off"
                            onkeydown="return event.key !== 'Enter';">
                    </div>
                </div>

                <div class="col-4 d-flex justify-content-end ">
                    <form action="" method="post">
                        <button
                            type="submit"
                            class="btn btn-info me-2 text-white periode1"
                            id="periode1"><i class="fa-solid fa-print me-2" style="color: #f5f5f5;"></i>Periode 1</button>
                        <button
                            type="submit"
                            class="btn btn-info text-white periode2"
                            id="periode2"><i class="fa-solid fa-print me-2" style="color: #f5f5f5;"></i>Periode 2</button>
                </div>


            </div>

            <table id="tablePraPrint" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr class="bg-info bg-gradient">
                        <th class="text-center">No</th>
                        <th class="text-center">Stambuk</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Matakuliah</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Tahun Akademik</th>
                        <th class="text-center">Tanggal Bayar</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="checkedAll"
                                onkeydown="return event.key !== 'Enter';">
                        </th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    // Menampilkan data laporan setelah filter diterapkan
                    if (isset($data['pembayaran'])) {
                        foreach ($data['pembayaran'] as $index => $pmb):
                    ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td class="text-center"><?= $pmb['stambuk'] ?></td>
                                <td class="text-center"><?= $pmb['nama'] ?></td>
                                <td class="text-center"><?= $pmb['matakuliah'] ?></td>
                                <td class="text-center"><?= $pmb['semester'] ?></td>
                                <td class="text-center"><?= $pmb['tahun_akademik'] ?></td>
                                <td class="text-center"><?= $pmb['tanggal_pembayaran'] ?></td>
                                <td class="text-center">Rp. <?= $pmb['jumlah_pembayaran'] ?></td>
                                <td class="text-center"><?= $pmb['status'] ?></td>
                                <td class="text-center">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="<?= $pmb['stambuk']; ?>"
                                        id="checkedOne"
                                        onkeydown="return event.key !== 'Enter';"
                                        name="stambuk[]">
                                </td>
                            </tr>
                    <?php endforeach;
                    } ?>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Filter Laporan -->
    <div class="modal fade" id="formBeranda" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModalLabel">Filter Laporan Harian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk filter laporan -->
                    <form method="POST" action="<?= BASEURL ?>/Beranda/CariTanggal" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Awal</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Akhir</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
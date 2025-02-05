<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/pembayaran.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Periode</h5>
                <h2 class="card-subtitle mb-2">2</h2>
                <p class="card-text">Print Laporan Pembayaran</p>
            </div>
        </div>
    </div>
</div>

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4">
            <div class="text-start mb-3">
                <a class="btn btn-danger opacity-75 add-pembayaran" role="button" href="<?= BASEURL ?>/Beranda"><i class="fa-solid fa-xmark" style="color: #fafafa;"></i> Batal</a>
            </div>
            <table id="tablePrint" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">INVOICE</th>
                        <th class="text-center">TANGGAL BAYAR</th>
                        <th class="text-center">STAMBUK</th>
                        <th class="text-center">NAMA MAHASISWA</th>
                        <th class="text-center">ANGKATAN</th>
                        <th class="text-center">SEMESTER</th>
                        <th class="text-center">MATAKULIAH</th>
                        <th class="text-center">JUMLAH TAGIHAN</th>
                        <th class="text-center">JUMLAH BAYAR</th>
                        <th class="text-center">SISA BAYAR</th>
                        <th class="text-center">KET</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inv = 0;
                    if (isset($data['pembayaran'])) {
                        foreach ($data['pembayaran'] as $index => $cetak):
                            $inv++;
                            if ($cetak['semester'] !== 'Genap') {
                                continue; // Jika bukan semester Ganjil, skip iterasi ini
                            }
                            // Use str_pad to add leading zeros to $inv
                            $invWithLeadingZeros = str_pad($inv, 3, '0', STR_PAD_LEFT);
                            // Menghitung Sisa Bayar
                            $jumlahTagihan = $cetak['jumlah_tagihan'];
                            $jumlahBayar = $cetak['jumlah_pembayaran'];
                            $sisaBayar = $jumlahTagihan - $jumlahBayar; // Hitung sisa bayar

                    ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td class="text-center">INV/LAB/<?= $invWithLeadingZeros ?>/022022</td>
                                <td class="text-center"><?= $cetak['tanggal_pembayaran'] ?></td>
                                <td class="text-center"><?= $cetak['stambuk'] ?></td>
                                <td class="text-center"><?= $cetak['nama'] ?></td>
                                <td class="text-center"><?= $cetak['angkatan'] ?></td>
                                <td class="text-center"><?= $cetak['semester'] ?></td>
                                <td class="text-center"><?= $cetak['matakuliah'] ?></td>
                                <td class="text-center"><?= $cetak['jumlah_tagihan'] ?></td>
                                <td class="text-center"><?= $cetak['jumlah_pembayaran']  ?></td>
                                <td class="text-center"><?= $sisaBayar ?></td>
                                <td class="text-center"><?= $cetak['status'] ?></td>

                            </tr>
                    <?php endforeach;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
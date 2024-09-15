<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="<?= BASEURL ?>/assets/img/pembayaran.png" alt="foto-card4" width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Priode</h5>
                <h2 class="card-subtitle mb-2">1</h2>
                <p class="card-text">Print Laporan Pembayaran</p>
            </div>
        </div>
    </div>
</div>

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 71vh;">
        <div class="overflow-x-auto rounded-4 shadow-lg p-4">
            <div class="text-start mb-3">
                <a class="btn btn-danger opacity-75 add-pembayaran" role="button" href="<?= BASEURL ?>/Beranda"><i class="fa-solid fa-xmark" style="color: #fafafa;"></i> Batal</a>
            </div>
            <table id="tablePrint" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>INVOICE</th>
                        <th>TANGGAL BAYAR</th>
                        <th>STAMBUK</th>
                        <th>NAMA MAHASISWA</th>
                        <th>ALGO 2</th>
                        <th>ELDAS</th>
                        <th>ASD</th>
                        <th>BD 1</th>
                        <th>PBO</th>
                        <th>WEB</th>
                        <th>JARKOM</th>
                        <th>MOBILE</th>
                        <th>MS</th>
                        <th>SP</th>
                        <th>TOTAL</th>
                        <th>JUMLAH BAYAR</th>
                        <th>SISA BAYAR</th>
                        <th>KET</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $inv = 0;

                    $arrayLength = count($data['print']);
                    // foreach ($combinedData as $cetak => $matkul) :

                    for ($i = 0; $i < $arrayLength; $i++) {
                        $cetak = $data['print'][$i];
                        $matkul = $data['matkul'][$i];
                        $no++;
                        $inv++;
                        $waktuPembayaran = $cetak['waktupembayaran'];

                        if ($waktuPembayaran != '0000-00-00' && $waktuPembayaran != '') {
                            $formattedDate = date('d-m-Y', strtotime($waktuPembayaran));
                        } else {
                            $formattedDate = '-';
                        }
                        // Use str_pad to add leading zeros to $inv
                        $invWithLeadingZeros = str_pad($inv, 3, '0', STR_PAD_LEFT);

                        $algo2 = '-';
                        $eldas = '-';
                        $asd = '-';
                        $bd1 = '-';
                        $pbo = '-';
                        $web = '-';
                        $jarkom = '-';
                        $mobile = '-';
                        $ms = '-';
                        $sp = '-';

                        foreach ($matkul as $matkul2) {
                            switch ($matkul2['kodematakuliah']) {
                                case '002':
                                    $algo2 = 'Rp. 55.000';
                                    break;
                                case '006':
                                    $eldas = 'Rp. 55.000';
                                    break;
                                case '017':
                                    $asd = 'Rp. 55.000';
                                    break;
                                case '005':
                                    $bd1= 'Rp. 55.000';
                                    break;
                                case '008':
                                    $pbo= 'Rp. 55.000';
                                    break;
                                case '009':
                                    $web = 'Rp. 55.000';
                                    break;
                                case '010':
                                    $jarkom = 'Rp. 55.000';
                                    break;
                                case '011':
                                    $mobile = 'Rp. 55.000';
                                    break;
                                case '018':
                                    $ms = 'Rp. 55.000';
                                    break;
                                case '019':
                                    $sp = 'Rp. 55.000';
                                    break;
                            }
                        }

                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>INV/LAB/<?= $invWithLeadingZeros ?>/022022</td>
                            <td><?= $formattedDate ?></td>
                            <td><?= $cetak['stambuk'] ?></td>
                            <td><?= $cetak['nama'] ?></td>
                            <td><?= $algo2 ?></td>
                            <td><?= $eldas ?></td>
                            <td><?= $asd ?></td>
                            <td><?= $bd1?></td>
                            <td><?= $pbo?></td>
                            <td><?= $web ?></td>
                            <td><?= $jarkom ?></td>
                            <td><?= $mobile ?></td>
                            <td><?= $ms ?></td>
                            <td><?= $sp ?></td>
                            <td><?= $cetak['nominal'] ?></td>
                            <td><?= $cetak['nominal'] ?></td>
                            <td>-</td>
                            <td><?= $cetak['status'] ?></td>
                        </tr>
                    <?php
                        // endforeach; 
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
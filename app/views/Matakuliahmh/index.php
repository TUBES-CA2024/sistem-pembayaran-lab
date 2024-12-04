<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/matakuliahmh.css">

<div class="container-user col-12 mx-auto">
    <div class="overflow-y-auto p-4" style="max-height: 81vh;">
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
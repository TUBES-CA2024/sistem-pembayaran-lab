<!-- views/upload_excel.php -->
<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/pembayaran.css">
<div class="row p-2 ms-3 me-3">
    <div class="col-12 card text-body-secondary shadow-lg bg-light bg-gradient">
        <div class="row">
            <div class="col-1 align-self-center">
                <img
                    src="<?= BASEURL ?>/assets/img/pembayaran.png"
                    alt="foto-card4"
                    width="85px">
            </div>
            <div class="col-md-11 card-body">
                <h5 class="card-title">Tagihan</h5>
                <h2 class="card-subtitle mb-2"><?= $data['countpembayaran']['jumlahPembayaran'] ?></h2>
                <p class="card-text">Jumlah Tagihan</p>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <?php PesanFlash::flash(); ?>
</div>

<div class="container mt-3">
    <form action="<?= BASEURL; ?>/Tagihan/tambah" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="excel_file">Upload file Excel:</label>
            <input type="file" name="excel_file" id="excel_file" class="from-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Excel</button>
    </form>
</div>
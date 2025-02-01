<!-- views/upload_excel.php -->
<div class="col-lg-6">
    <?php PesanFlash::flash(); ?>
</div>
<form action="<?= BASEURL; ?>/Tagihan/tambah" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="excel_file">Upload file Excel:</label>
        <input type="file" name="excel_file" id="excel_file" class="from-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Excel</button>
</form>
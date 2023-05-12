<?php
error_reporting(0);
$obj_kartu = new Kartu();
$data_kartu = $obj_kartu->dataKartu();
$iedit = $_REQUEST['iedit'];
$kartu = !empty($iedit) ? $obj_kartu->getKartu($iedit) : array();

?>
<form class="mt-4" action="controller/kartuController.php" method="POST">
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode</label>
        <div class="col-8">
            <input id="kode" name="kode" type="text" class="form-control" value="<?= $kartu['kode'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <input id="nama" name="nama" type="text" class="form-control" value="<?= $kartu['nama'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Diskon</label>
        <div class="col-8">
            <input id="diskon" name="diskon" type="text" class="form-control" value="<?= $kartu['diskon'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Iuran</label>
        <div class="col-8">
            <input id="iuran" name="iuran" type="text" class="form-control" value="<?= $kartu['iuran'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <?php
            if (empty($iedit)) {
            ?>
                <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
            <?php } else { ?>

                <input type="hidden" name="idx" value="<?= $iedit ?>">
                <button name="proses" type="submit" value="ubah" class="btn btn-primary">Update</button>
            <?php } ?>
            <a href="index.php?url=kartu" type="button" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
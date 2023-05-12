<?php
error_reporting(0);
$obj_pelanggan = new Pelanggan();
$data_pelanggan = $obj_pelanggan->dataPelanggan();
$iedit = $_REQUEST['iedit'];
$pelanggan = !empty($iedit) ? $obj_pelanggan->getPelanggan($iedit) : array();

?>
<form class="mt-4" action="controller/pelangganController.php" method="POST">
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode</label>
        <div class="col-8">
            <input id="kode" name="kode" type="text" class="form-control" value="<?= $pelanggan['kode'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <input id="nama" name="nama" type="text" class="form-control" value="<?= $pelanggan['nama'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <input id="email" name="email" type="email" class="form-control" value="<?= $pelanggan['email'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Jenis Kelamin</label>
        <div class="col-8">
            <select class="custom-select" id="inputGroupSelect03" name="jk" required>
                <option selected>Choose...</option>
                <option value="L" <?= ($pelanggan['gender'] == 'L') ? 'selected' : '' ?>>L</option>
                <option value="P" <?= ($pelanggan['gender'] == 'P') ? 'selected' : '' ?>>P</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Tempat Lahir</label>
        <div class="col-8">
            <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $pelanggan['tmp_lahir'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Tanggal Lahir</label>
        <div class="col-8">
            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $pelanggan['tgl_lahir'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text6" class="col-4 col-form-label">Jenis Kartu</label>
        <div class="col-8">
            <input id="kartu_id" name="kartu_id" type="text" class="form-control" value="<?= $pelanggan['kartu_id'] ?>">
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
            <a href="index.php?url=pelanggan" type="button" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
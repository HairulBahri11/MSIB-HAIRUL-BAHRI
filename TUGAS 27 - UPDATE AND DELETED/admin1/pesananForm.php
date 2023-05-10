<?php
error_reporting(0);
$obj_pesanan = new Pesanan();
$data_pesanan = $obj_pesanan->dataPesanan();
$iedit = $_REQUEST['iedit'];
$pesanan = !empty($iedit) ? $obj_pesanan->getPesanan($iedit) : array();

?>
<form class="mt-4" action="controller/pesananController.php" method="POST">
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <input id="pelanggan_id" name="pelanggan_id" type="text" value="<?= $pesanan['pelanggan_id'] ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Tanggal</label>
        <div class="col-8">
            <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $pesanan['tanggal'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">total</label>
        <div class="col-8">
            <input id="total" name="total" type="number" class="form-control" value="<?= $pesanan['total'] ?>">
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
            <a href="index.php?url=pesanan" type="button" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
<?php

$model = new Produk();
$data_produk = $model->dataProduk();
$sesi =  $_SESSION['MEMBER'];

if (isset($sesi)) {
?>
    <h1 class="mt-4">Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i>
                                DataTable Example -->
            <!-- membuat tombol mengarahkan ke file produk_form.php -->

            <?php
            if ($sesi['role'] != ('staff' && 'manager')) {
            ?>
                <a href="index.php?url=productTambah" class="btn btn-primary btn-sm">Tambah</a>

            <?php } ?>

        </div>
        <div class="card-body">
            <table id="datatablesSimple" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_produk as $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['kode']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td>Rp <?= number_format($data['harga_beli'], 0, ",", "."); ?></td>
                            <td>Rp <?= number_format($data['harga_jual'], 0, ",", "."); ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td><?= $data['min_stok']; ?></td>
                            <td><?= $data['kategori']; ?></td>
                            <td>
                                <form action="controller/productController.php" method="POST">
                                    <input type="hidden" name="idx" value="<?= $data['id'] ?>">
                                    <a class="btn btn-info btn-sm" href="index.php?url=productDetail&id=<?= $data['id'] ?>">Detail</a>

                                    <?php
                                    if ($sesi['role'] != ('staff' && 'manager')) {
                                    ?>
                                        <a class="btn btn-warning btn-sm" href="index.php?url=productTambah&iedit=<?= $data['id'] ?>">Ubah</a>
                                        <button type="submit" name="proses" value="hapus" class="btn btn-danger btn-sm" onclick="return alert('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                        ?<?php } ?>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>
<?php
} else {
    echo '<script> alert("anda tidak boleh masuk ");history.back();</script>';
}
?>
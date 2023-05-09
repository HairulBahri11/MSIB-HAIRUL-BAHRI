<?php

$model = new Kartu();
$jenis_produk = $model->dataKartu();
?>
<h1 class="mt-4">Kartu</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Kartu</li>
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

        <a href="index.php?url=kartuTambah" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Diskon</th>
                    <th>Iuran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jenis_produk as $data) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['kode']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['diskon'] * 100; ?>%</td>
                        <td>Rp <?= number_format($data['iuran'], 0, ",", "."); ?></td>
                        <td>
                            <form action="controller/kartuController.php" method="POST">
                                <a class="btn btn-info btn-sm" href="index.php?url=kartuDetail&id=<?= $data['id'] ?>">Detail</a>
                                <a class="btn btn-warning btn-sm" href="">Ubah</a>
                                <a class="btn btn-danger btn-sm" href="">Hapus</a>
                                <input type="hidden" name="idx" value="<?= $data['id'] ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
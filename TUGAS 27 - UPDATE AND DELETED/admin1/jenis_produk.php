<?php

$model = new JenisProduk();
$jenis_produk = $model->JenisProduk();
?>
<h1 class="mt-4">Jenis Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Jenis Produk</li>
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
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <table id="datatablesSimple" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jenis_produk as $data) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['keterangan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
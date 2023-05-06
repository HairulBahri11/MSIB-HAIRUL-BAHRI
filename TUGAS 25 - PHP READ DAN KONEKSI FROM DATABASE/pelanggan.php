<?php

$model = new Pelanggan();
$jenis_produk = $model->dataPelanggan();
?>
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Pelanggan</li>
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
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Kartu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jenis_produk as $data) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['kode']; ?></td>
                        <td><?= $data['nama_pelanggan']; ?></td>
                        <td><?= $data['jk']; ?></td>
                        <td><?= $data['tmp_lahir']; ?></td>
                        <td><?= $data['tgl_lahir']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['kartu']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
<?php

$model = new Pesanan();
$pesanan = $model->dataPesanan();
?>
<h1 class="mt-4">Pesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Pesanan</li>
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

        <a href="index.php?url=pesananForm" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pesanan as $data) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_pelanggan']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>Rp <?= number_format($data['total'], 0, ",", "."); ?></td>
                        <td>
                            <form action="controller/pesananController.php" method="POST">
                                <a class="btn btn-info btn-sm" href="index.php?url=pesananDetail&id=<?= $data['id_pesanan'] ?>">Detail</a>
                                <a class="btn btn-warning btn-sm" href="index.php?url=pesananForm&iedit=<?= $data['id_pesanan'] ?>">Ubah</a>
                                <button type="submit" name="proses" value="hapus" class="btn btn-danger btn-sm" onclick="return alert('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                <input type="hidden" name="idx" value="<?= $data['id_pesanan'] ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
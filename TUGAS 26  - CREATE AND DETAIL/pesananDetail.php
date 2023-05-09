<?php
$id = $_REQUEST['id'];
$model = new Pesanan();
$pesanan = $model->getPesanan($id);


?>
<h1 class="mt-4">Detail pesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Detail pesanan</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table width="100%">
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?= $pesanan['nama_pelanggan'] ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= $pesanan['tanggal'] ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>Rp <?= number_format($pesanan['total'], 0, ",", "."); ?></td>
            </tr>
        </table>
    </div>

</div>
</div>
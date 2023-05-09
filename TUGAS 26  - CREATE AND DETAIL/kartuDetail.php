<?php
$id = $_REQUEST['id'];
$model = new Kartu();
$kartu = $model->getKartu($id);


?>
<h1 class="mt-4">Detail Kartu</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Detail Kartu</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table width="100%">
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?= $kartu['kode'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $kartu['nama'] ?></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td>:</td>
                <td><?= $kartu['diskon'] * 100; ?>%</td>
            </tr>
            <tr>
                <td>Iuran</td>
                <td>:</td>
                <td>Rp <?= number_format($kartu['iuran'], 0, ",", "."); ?></td>
            </tr>
        </table>
    </div>

</div>
</div>
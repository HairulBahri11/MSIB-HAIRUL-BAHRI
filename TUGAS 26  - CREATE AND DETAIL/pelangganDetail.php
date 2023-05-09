<?php
$id = $_REQUEST['id'];
$model = new Pelanggan();
$pelanggan = $model->getPelanggan($id);


?>
<h1 class="mt-4">Detail Pelanggan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Detail Pelanggan</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table width="100%">
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?= $pelanggan['kode'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $pelanggan['nama'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $pelanggan['gender'] ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $pelanggan['tmp_lahir'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= $pelanggan['tgl_lahir'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $pelanggan['email'] ?></td>
            </tr>
            <tr>
                <td>Kartu</td>
                <td>:</td>
                <td><?= $pelanggan['kartu'] ?></td>
            </tr>
        </table>
    </div>

</div>
</div>
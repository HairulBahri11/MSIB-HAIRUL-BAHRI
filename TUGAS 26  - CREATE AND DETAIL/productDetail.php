<?php
$id = $_REQUEST['id'];
$model = new Produk();
$produk = $model->getProduk($id);


?>
<h1 class="mt-4">Detail Product</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Detail Product</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table width="100%">
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?= $produk['kode'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $produk['nama'] ?></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td>:</td>
                <td><?= $produk['harga_beli'] ?></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td>:</td>
                <td><?= $produk['harga_jual'] ?></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><?= $produk['stok'] ?></td>
            </tr>
            <tr>
                <td>Minimal Stok</td>
                <td>:</td>
                <td><?= $produk['min_stok'] ?></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><?= $produk['Kategori'] ?></td>
            </tr>
        </table>
    </div>

</div>
</div>
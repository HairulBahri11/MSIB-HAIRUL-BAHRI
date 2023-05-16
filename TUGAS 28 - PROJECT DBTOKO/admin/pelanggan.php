<?php

$model = new Pelanggan();
$jenis_produk = $model->dataPelanggan();

$sesi =  $_SESSION['MEMBER'];

if (isset($sesi)) {
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
            <!-- <i class="fas fa-table me-1"></i>
        DataTable Example -->
            <?php
            if ($sesi['role'] != ('staff' && 'manager')) {
            ?>

                <a href="index.php?url=pelangganTambah" class="btn btn-primary btn-sm">Tambah</a>
            <?php } ?>
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
                            <td><?= $data['gender']; ?></td>
                            <td><?= $data['tmp_lahir']; ?></td>
                            <td><?= $data['tgl_lahir']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['kartu']; ?></td>
                            <td>
                                <form action="controller/pelangganController.php" method="POST">
                                    <a class="btn btn-info btn-sm" href="index.php?url=pelangganDetail&id=<?= $data['id'] ?>">Detail</a>

                                    <?php
                                    if ($sesi['role'] != ('staff' && 'manager')) {
                                    ?>
                                        <a class="btn btn-warning btn-sm" href="index.php?url=pelangganTambah&iedit=<?= $data['id'] ?>">Ubah</a>
                                        <button type="submit" name="proses" value="hapus" class="btn btn-danger btn-sm" onclick="return alert('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                        <input type="hidden" name="idx" value="<?= $data['id'] ?>">
                                    <?php } ?>
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
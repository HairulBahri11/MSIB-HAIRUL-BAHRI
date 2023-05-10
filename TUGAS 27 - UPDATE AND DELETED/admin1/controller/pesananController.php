<?php
include_once '../koneksi.php';
include_once '../models/pesanan.php';
// include_once 'product_form.php';

// step pertama yaitu menangkap requeest form
$tanggal = $_POST['tanggal'];
$pelanggan_id = $_POST['pelanggan_id'];
$total = $_POST['total'];

// menangkap form diatas dijadikan array
$data = [
    $tanggal,
    $total,
    $pelanggan_id,
];
$model = new Pesanan();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data);
        break;
    case 'hapus':
        unset($data);
        $id = $_POST['idx'];
        $model->delete($id);
        break;
    default:
        header('Location:../index.php?url=pesanan');
        break;
}
header('Location:../index.php?url=pesanan');

<?php
include_once '../koneksi.php';
include_once '../models/member.php';

// step pertama yaitu menangkap requeest form
// $fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
// $role = $_POST['role'];
// $foto = $_POST['foto'];

// menangkap form diatas dijadikan array
$data = [
    // $fullname,
    $username,
    $password,
    // $role,
    // $foto,
];

$model = new Member();
$rs = $model->cekLogin($data);
if(!empty($rs)){
    $_SESSION['MEMBER'] = $rs;
    header('Location:../index.php?url=product');
} else {
    echo '<script> alert("user/password anda salah"); history.back();</script>';
}



?>
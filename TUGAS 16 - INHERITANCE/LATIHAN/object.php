<?php

require_once 'hewan1.php';
require_once 'hewan2.php';
require_once 'hewan3.php';

$kucing = new Kucing();
$ayam = new Ayam();
$ular = new Ular();


$dataHewan = [$kucing, $ayam, $ular];
foreach ($dataHewan as $hewan) {
    echo $hewan->suara();
    echo $hewan->makanan();
    echo $hewan->jenis();
    echo $hewan->kaki();
}





?>